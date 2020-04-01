@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        Add a new Category
    </div>
    <div class="card-body">
        <form action="{{route('categories.store')}}" method="POST">

            <div class="form-group">
                @csrf
                <label for="name">Category Name</label>
                <input id="name" class="@error('name') is-invalid @enderror form-control" type="text" name="name">

            </div>
            @error('name')
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{$message}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            @enderror
            <div class="form-group">
                <button type="submit" class="btn btn-success">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection
