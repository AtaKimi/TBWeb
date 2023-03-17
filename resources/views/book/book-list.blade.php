@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <a href="/books/create"><button type="submit" class="btn btn-primary" >Create</button></a>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">UUID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Writer</th>
                    <th scope="col">Summary</th>
                    <th scope="col">Price</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Book Kind ID</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr>
                        <th scope="row"><a href="books/{{ $book->uuid }}">{{ $book->uuid }}</a></td>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->writer }}</td>
                        <td>{{ $book->summary }}</td>
                        <td>{{ $book->price }}</td>
                        <td scope="row"><img src="{{ $book->photo }}" alt="book photo"
                                style="width: 200px; height: 200px;"></td>
                        <td><a href="book-kinds/{{ $book->book_kind_id }}">{{ $book->book_kind->name }}</a></td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
