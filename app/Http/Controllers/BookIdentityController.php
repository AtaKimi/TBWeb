<?php

namespace App\Http\Controllers;

use App\Models\BookIdentity;

class BookIdentityController extends Controller
{
    public function index()
    {
        $book_identities = BookIdentity::all();
        return view('book-identity.book-identity-list', ['book_identities' => $book_identities]);
    }

    public function show(BookIdentity $book_identity)
    {
        return view('book-identity.book-identity-show', ['book_identity' => $book_identity]);
    }

    public function create()
    {
        return view('book-identity.book-identity-create');
    }

    public function store()
    {
        $validatedData = request()->validate([
            'name' => ['required', 'string'],
        ]);

        BookIdentity::create($validatedData);

        return redirect()->route('book-identity-list')->with('message', 'Book identity created!');
    }

    public function edit(BookIdentity $book_identity)
    {
        return view('book-identity.book-identity-edit', ['book_identity' => $book_identity]);
    }

    public function update(BookIdentity $book_identity)
    {
        $validatedData = request()->validate([
            'name' => ['required', 'string'],
        ]);

        $book_identity->update($validatedData);

        return redirect()->route('book-identity-list')->with('message', 'Book identity updated!');
    }

    public function destroy(BookIdentity $book_identity)
    {
        $book_identity->delete();

        return redirect()->route('book-identity-list')->with('message', 'Book identity deleted!');
    }
}
