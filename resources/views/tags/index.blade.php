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
         <span>All Tags</span>
         <a href="{{route('tags.create')}}" class="btn btn-info float-right">Add tag</a>
      </div>
   </div>
   <div class="card-body p-0">
      {{-- table --}}
      <table  class="table table-striped">
         <tbody>
            @forelse ($tags as $tag)
            <tr>
               <td>
                   <span>{{$tag->name}}</span>
                   <span class="badge badge-info">{{$tag->posts->count()}}</span>
                </td>

               <td>
                  <form action="{{route('tags.destroy',$tag->id)}}" method="POST" class="float-right ml-2">
                     @csrf
                     @method('DELETE')
                     <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                  </form>
                  <a href="{{route('tags.edit',$tag->id)}}" class="btn btn-success float-right btn-sm">Edit</a>
               </td>
            </tr>
            @empty
            <p class="card-text text-center mt-3">No tags yet</p>
            @endforelse
         </tbody>
      </table>
      {{-- end table --}}
   </div>
</div>
@endsection
