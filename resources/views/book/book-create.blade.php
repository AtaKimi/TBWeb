@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card bg-light mx-auto w-75 pb-3">
            <div class="card-body">
                <h2>Form</h2>
                <form class="row g-3" method="POST" action="/books/store">
                    @csrf
                    <div class="form-group col-4">
                        <label for="uuid">UUID </label>
                        <input type="text" class="form-control" name="uuid" id="uuid" placeholder="Enter name" />
                        @error('uuid')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group col-4">
                        <label for="title">Title </label>
                        <input type="text" class="form-control" name="title" id="title"
                            placeholder="Enter title" />
                        @error('title')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group col-4">
                        <label for="writer">writer </label>
                        <input type="text" class="form-control" name="writer" id="writer"
                            placeholder="Enter writer" />
                        @error('writer')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="summary">Sumarry</label>
                        <textarea class="form-control" id="summary" name="summary" rows="3"></textarea>
                        @error('summary')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group  col-6">
                        <label for="price">Price </label>
                        <input type="text" class="form-control" name="price" id="price"
                            placeholder="Enter price" />
                        @error('price')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group  col-6">
                        <label for="photo">Photo </label>
                        <input type="text" class="form-control" name="photo" id="photo"
                            placeholder="Enter photo link" />
                        @error('photo')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group ">
                        <label for="book_kind">Book kind </label>
                        <select id="book_kind_id" name="book_kind_id" class="form-control">
                            @foreach ($book_kinds as $book_kinds)
                                <option value="{{ $book_kinds->id }}">{{ $book_kinds->name }}</option>
                            @endforeach
                        </select>
                        @error('book_kind')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="">
                        @foreach ($book_identities as $book_identity)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{ $book_identity->id }}"
                                    name="book_identities[]" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    {{ $book_identity->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                    <button type="submit" class="btn btn-success col-3 ms-auto me-2" onclick="validate()">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
