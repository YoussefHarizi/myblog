@extends('layouts.app')
@section('content')
<div class="card">
   <div class="card-header">Profile</div>
   <div class="card-body">
      <form action="" method="POST" enctype="multipart/form-data">
         <div class="form-group">
            @csrf

            <label for="name">Name</label>
            <input id="name" value="{{isset($user)?$user->name:old('name')}}" class="form-control" type="text" name="name">
         </div>
         <div class="form-group">
            <label for="email">Email</label>
            <input id="email" value="{{$user->email}}" class="form-control" type="email" name="email">
         </div>

         <div class="form-group">
            <label for="about">About</label>
            <textarea id="content"  placeholder="about you" class="form-control" rows="4" name="about">{{$profile->about}}</textarea>
        </div>
        <div class="form-group">
            <label for="facebook">facebook</label>
            <input id="facebook" value="{{$profile->facebook}}" class="form-control" type="text" name="facebook">
         </div>
        <div class="form-group">
            <label for="twitter">twitter</label>
            <input id="twitter" value="{{$profile->twitter}}" class="form-control" type="text" name="twitter">
         </div>
         <div>
            <img src="{{$profile->picture !=null ? asset('storage/'.$user->getPicture()):$user->getGravatar()}}" alt="image" style="width:90px" >
         </div>
         <div class="form-group">
             <label for="image">Avatar</label>
             <input id="image"  class="form-control-file" type="file" name="picture">
         </div>

         <div class="form-group">
            <button type="submit" class="btn btn-success">Update Profile</button>
         </div>
      </form>
   </div>
</div>
@endsection
