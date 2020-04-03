@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="clearfix">

            <span>All Posts</span>
            <a href="{{route('posts.create')}}" class="btn btn-info float-right">Add Post</a>
        </div>
        @if (session()->has('success'))
        <div class="alert alert-success mt-1 mb-0 fade show" role="alert">
            {{session()->get('success')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

        @endif
        @if (session()->has('destroy'))
        <div class="alert alert-danger mt-1 mb-0 fade show" role="alert">
            {{session()->get('destroy')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

        @endif
    </div>
    <div class="card-body p-0">
        {{-- table --}}
        <table  class="table table-striped table-bordered">
            <thead>
                <th>Image</th>
                <th>Title</th>
                <th>Actions</th>

            </thead>
            <tbody>

                @forelse ($posts as $post)
                <tr>
                    <td>
                        <img src="{{asset('storage/'.$post->image)}}" alt="image" style="height:100px;">
                    </td>
                    <td style="vertical-align:middle;" >{{$post->title}}</td>
                    <td style="vertical-align:middle;">
                        <form action="{{route('posts.destroy',$post->id)}}" method="POST" class="float-right ml-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                        <a href="{{route('posts.edit',$post->id)}}" class="btn btn-success float-right btn-sm">Edit</a>
                    </td>
                </tr>

                    @empty
                    <p class="card-text m-2 text-center">No Post yet</p>

                    @endforelse
            </tbody>
        </table>
        {{-- end table --}}

    </div>
</div>

@endsection
