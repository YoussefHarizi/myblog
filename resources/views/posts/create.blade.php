@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <span>
            {{isset($post) ? "Update Post": "Add a new Post"}}
        </span>
        @if ($errors->any())
            <div >
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger alert-dismissible fade show mb-1" role="alert">
                        {{ $error }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                @endforeach
            </div>
        @endif


    </div>
    <div class="card-body">
        <form action="{{isset($post)?route('posts.update',$post->id): route('posts.store')}}" method="POST" enctype="multipart/form-data">

            @csrf
            @if (isset($post))
            @method('PUT')
            @endif
            <div class="form-group">
                <label for="title">Title</label>
                <input id="title" placeholder="Post Title" value="{{isset($post)?$post->title:old('title')}}" class="form-control" type="text" name="title">
            </div>


                <input   value="{{Auth::user()->id}}" type="hidden" name="user_id">

            <div class="form-group">
                <label for="description">description</label>
                <textarea id="description"  placeholder="Post description" class="form-control" rows="2" name="description">{{isset($post)?$post->description:old('description')}}</textarea>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea id="content"  placeholder="Post content" class="form-control" rows="4" name="content">{{isset($post)?$post->content:old('content')}}</textarea>
            </div>
            @if (!isset($post))

            <div class="form-group">
                <label for="image">Image</label>
                <input id="image"  class="form-control-file" type="file" name="image">
            </div>
            @else

               <div>
                   <img src="{{asset('storage/'.$post->image)}}" alt="image" class="w-100">
                </div>
                <div class="form-group">
                    <label for="image">Change Image</label>
                    <input id="image"  class="form-control-file" type="file" name="image">
                </div>
            @endif
            <div class="form-group">
                <label for="category_id">Select Category</label>
                <select class="form-control" id="category_id" name="category_id">
                  @foreach ($categories as $category)
                      <option value="{{$category->id}}">{{$category->name}}</option>
                  @endforeach
                </select>
              </div>
              @if ($tags->count()>=1)

              <div class="form-group">
                  <label for="tags_id">Select Tags</label>
                  <select class="form-control" id="tags_id" name="tags_id[]" multiple>
                    @foreach ($tags as $tag)
                        <option value="{{$tag->id}}"
                            @if (isset($post) && $post->hastags($tag->id))
                             selected
                            @endif>{{$tag->name}}</option>
                    @endforeach
                  </select>
                </div>
              @endif
            <div class="form-group">
                <button type="submit" class="btn btn-success">{{isset($post)?"Update":"Save"}}</button>
            </div>
        </form>
    </div>
</div>
@endsection

