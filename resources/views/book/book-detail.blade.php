@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between">
            <a href="/books/{{ $book->uuid }}/edit"><button type="submit" class="btn btn-success ml-2">Update</button></a>
            <form action="/books/{{ $book->uuid }}/destroy" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
        <table class="table">
            <tbody>
                <tr>
                    <th>photo: </th>
                    <td scope="row"><img src="{{ $book->photo }}" alt="book photo" style="width: 200px; height: 200px;">
                    </td>
                </tr>
                <tr>
                    <th>UUID: </th>
                    <td scope="row">{{ $book->uuid }}</td>
                </tr>
                <tr>
                    <th>Title: </th>
                    <td scope="row">{{ $book->title }}</td>
                </tr>
                <tr>
                    <th>writer: </th>
                    <td scope="row">{{ $book->writer }}</td>
                </tr>
                <tr>
                    <th>summary: </th>
                    <td scope="row">{{ $book->summary }}</td>
                </tr>
                <tr>
                    <th>price: </th>
                    <td scope="row">{{ $book->price }}</td>
                </tr>
                <tr>
                    <th>Book kind: </th>
                    <td scope="row"><a href="/book-kinds/{{ $book->book_kind_id }}">{{ $book->book_kind->name }}</a>
                    </td>
                </tr>
                <tr>
                    <th>Book identity: </th>
                    <td scope="row">
                        @foreach ($book->book_identity as $book_identity)
                            @if (count($book->book_identity) != 0)
                                @if (count($book->book_identity) == 1)
                                    {{ $book_identity->name }}
                                @elseif(count($book->book_identity) - 1 == $loop->index)
                                    and {{ $book_identity->name }}
                                @else
                                    {{ $book_identity->name }},
                                @endif
                            @endif
                        @endforeach
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
