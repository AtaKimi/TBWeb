@extends('layouts.app')

@section('content')
<div class="container">
  <div class="d-flex justify-content-between">
    <a href="/book-identities/{{$book_identity->id}}/edit"><button type="submit" class="btn btn-primary" >Update</button></a>
      <form action="/book-identities/{{ $book_identity->id }}/destroy" method="post">
          @csrf
          @method('delete')
          <button type="submit" class="btn btn-danger">Delete</button>
      </form>
  </div>
    <table class="table">
        <tbody>
          <tr>
            <th>ID: </th>
            <td scope="row">{{$book_identity->id}}</td>
          </tr>
          <tr>
            <th>Name: </th>
            <td scope="row">{{$book_identity->name}}</td>
          </tr>
        </tbody>
      </table>
</div>
@endsection