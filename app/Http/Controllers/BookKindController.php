<?php

namespace App\Http\Controllers;

use App\Models\BookKind;

class BookKindController extends Controller
{
    public function index()
    {
        $book_kinds = BookKind::all();
        return view('book-kind.book-kind-list', ['book_kinds' => $book_kinds]);
    }

    public function show(BookKind $book_kind)
    {
        return view('book-kind.book-kind-show', ['book_kind' => $book_kind]);
    }

    public function create()
    {
        return view('book-kind.book-kind-create');
    }

    public function store()
    {
        $validatedData = request()->validate([
            'name' => ['required', 'string'],
        ]);

        BookKind::create($validatedData);

        return redirect()->route('book-kind-list')->with('message', 'Book kind created!');
    }

    public function edit(BookKind $book_kind)
    {
        return view('book-kind.book-kind-edit', ['book_kind' => $book_kind]);
    }

    public function update(BookKind $book_kind)
    {
        $validatedData = request()->validate([
            'name' => ['required', 'string'],
        ]);

        $book_kind->update($validatedData);

        return redirect()->route('book-kind-list')->with('message', 'Book kind updated!');
    }

    public function destroy(BookKind $book_kind)
    {
        $book_kind->delete();

        return redirect()->route('book-kind-list')->with('message', 'Book kind deleted!');
    }
}
