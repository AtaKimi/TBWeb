@extends('layouts.app')

@section('content')
<div class="container">
  <a href="/book-identities/create"><button type="submit" class="btn btn-primary" >Create</button></a>
    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($book_identities as $book_identity)
          <tr>
            <th scope="row"><a href="book-identities/{{$book_identity->id}}">{{$book_identity->id}}</a></td>
            <td>{{$book_identity->name}}</td>
          </tr>
          @endforeach

        </tbody>
      </table>
</div>
@endsection