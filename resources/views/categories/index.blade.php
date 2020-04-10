@extends('layouts.app')
@section('content')
<div class="card">
   @if (session()->has('success'))
   <div class="alert alert-success mt-1 mb-0 fade show flash" role="alert">
      {{session()->get('success')}}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
   </div>
   @endif
   @if (session()->has('destroy'))
   <div class="alert alert-danger mt-1 mb-0 fade show flash" role="alert">
      {{session()->get('destroy')}}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
   </div>
   @endif
   <div class="card-header">
      <div class="clearfix">
         <span>All Categories</span>
         <a href="{{route('categories.create')}}" class="btn btn-info float-right">Add Category</a>
      </div>
   </div>
   <div class="card-body p-0">
      {{-- table --}}
      <table  class="table table-striped">
         <tbody>
            @forelse ($categories as $category)
            <tr>
               <td>{{$category->name}}</td>
               <td>
                  <form action="{{route('categories.destroy',$category->id)}}" method="POST" class="float-right ml-2">
                     @csrf
                     @method('DELETE')
                     <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                  </form>
                  <a href="{{route('categories.edit',$category->id)}}" class="btn btn-success float-right btn-sm">Edit</a>
               </td>
            </tr>
            @empty
            <p class="card-text text-center mt-3">No categories yet</p>
            @endforelse
         </tbody>
      </table>
      {{-- end table --}}
   </div>
</div>
@endsection
