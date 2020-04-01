@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <span>All Categories</span>
        <a href="{{route('categories.create')}}" class="btn btn-info float-right">Add Category</a>
    </div>
    <div class="card-body">
        <p class="card-text">No categories yet</p>
    </div>
</div>

@endsection
