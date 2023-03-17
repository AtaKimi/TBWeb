<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookIdentity;
use App\Models\BookKind;
use App\Models\Isbn;

use function PHPUnit\Framework\isEmpty;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::orderBy('created_at', 'DESC')->get();
        return view('book.book-list', ['books' => $books]);
    }

    public function show(Book $book)
    {
        return view('book.book-detail', ['book' => $book]);
    }

    public function create()
    {
        $book_kinds = BookKind::all();
        $book_identities = BookIdentity::all();
        return view('book.book-create', ['book_kinds' => $book_kinds, 'book_identities' => $book_identities]);
    }

    public function store()
    {
        $validatedData = request()->validate([
            'uuid' => ['required', 'uuid'],
            'title' => ['required', 'string', 'max:255'],
            'writer' => ['required', 'string', 'max:255'],
            'summary' => ['required', 'string', 'max:1000'],
            'price' => ['required', 'integer'],
            'summary' => ['required', 'string', 'max:1000'],
            'photo' => ['required', 'string', 'max:255'],
            'book_kind_id' => ['required', 'integer'],
            'book_identities.*' => ['integer'],
        ]);

        $isbn = Isbn::find(request()->only('uuid'));
        if (isEmpty($isbn)) {
            $isbn = Isbn::create(request()->only('uuid'));
        }

        $book = Book::create($validatedData);
        $book = Book::find($validatedData['uuid']);

        foreach ($validatedData['book_identities'] as  $book_identity) {
            if(!$book->book_identity->contains('id', $book_identity)){
                $book->book_identity()->attach($book_identity);
            } 
        }

        return redirect()->route('book-list')->with('message', 'Book created!');
    }

    public function edit(Book $book)
    {
        $book_kinds = BookKind::all();
        $book_identities = BookIdentity::all();
        return view('book.book-update', ['book' => $book, 'book_kinds' => $book_kinds, 'book_identities' => $book_identities]);
    }

    public function update(Book $book)
    {
        $validatedData = request()->validate([
            'uuid' => ['required', 'uuid'],
            'title' => ['required', 'string', 'max:255'],
            'writer' => ['required', 'string', 'max:255'],
            'summary' => ['required', 'string', 'max:1000'],
            'price' => ['required', 'integer'],
            'summary' => ['required', 'string', 'max:1000'],
            'photo' => ['required', 'string', 'max:255'],
            'book_kind_id' => ['required', 'integer'],
            'book_identities.*' => ['integer'],
        ]);

        $success = $book->update($validatedData);

        if(isset($validatedData['book_identities'])){
            
            foreach ($book->book_identity as $book_identity) {
                if(!in_array($book_identity->id, $validatedData['book_identities'])){
                  $book->book_identity()->detach($book_identity->id);
                }
            }
            //attach many to many rel
            foreach ($validatedData['book_identities'] as  $book_identity) {
                if(!$book->book_identity->contains('id', $book_identity)){
                    $book->book_identity()->attach($book_identity);
                } 
            }
        } 
        //delete all many to many rel
        else {
            foreach ($book->book_identity as $book_identity){
                $book->book_identity()->detach($book_identity->id);
            }
        }
        
        return redirect()->route('book-list')->with('message', 'Book updated!');
    }

    public function destroy(Book $book)
    {
        $book = $book->delete();
        return redirect()->route('book-list')->with('message', 'Book deleted!');
    }
}
