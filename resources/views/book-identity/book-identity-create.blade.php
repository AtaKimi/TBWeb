@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card bg-light mx-auto w-75 pb-3">
            <div class="card-body">
                <h2>Form</h2>
                <form class="row g-3" method="POST" action="/book-identities/store">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name:  </label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter name" />
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success col-3 ms-auto me-2" >Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
