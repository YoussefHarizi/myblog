@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        {{isset($tag) ? "Update tag": "Add a new tag"}}
        @if (session()->has('error'))
            <div class="alert alert-danger mt-1 mb-0 fade show flash" role="alert">
                {{session()->get('error')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

        @endif
    </div>
    <div class="card-body">
        <form action="{{isset($tag)?route('tags.update',$tag->id): route('tags.store')}}" method="POST">

            <div class="form-group">
                @csrf
                @if (isset($tag))
                @method('PUT')
                @endif

                <label for="name">tag Name</label>
            <input id="name" value="{{isset($tag)?$tag->name:old('name')}}" class="@error('name') is-invalid @enderror form-control" type="text" name="name">

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
                <button type="submit" class="btn btn-success">{{isset($tag)?"Update":"Save"}}</button>
            </div>
        </form>
    </div>
</div>
@endsection
