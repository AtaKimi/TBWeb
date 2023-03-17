@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between">
          <a href="/book-kinds/{{ $book_kind->id }}/edit"><button type="submit" class="btn btn-primary">Update</button></a>
            <form action="/book-kinds/{{ $book_kind->id }}/destroy" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
        <table class="table">
            <tbody>
                <tr>
                    <th>ID: </th>
                    <td scope="row">{{ $book_kind->id }}</td>
                </tr>
                <tr>
                    <th>Book kind: </th>
                    <td scope="row">{{ $book_kind->name }}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
