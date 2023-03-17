@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="/book-kinds/create"><button type="submit" class="btn btn-primary" >Create</button></a>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Book Kind</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($book_kinds as $book_kind)
                <tr>
                    <th scope="row"><a href="book-kinds/{{$book_kind->id}}">{{$book_kind->id}}</a></th>
                    <td>{{$book_kind->name}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
