@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="clearfix">

            <span>All Users</span>
        </div>
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
    </div>
    <div class="card-body p-0">
        {{-- table --}}
        <table  class="table table-striped table-bordered">
            <thead>
                <th>Image</th>
                <th>Username</th>
                <th>Permissions</th>
                <th>Action</th>

            </thead>
            <tbody>

                @forelse ($users as $user)
                <tr>
                    <td>
                        <img src="{{$user->hasPicture() ? asset('storage/'.$user->getPicture()):$user->getGravatar()}}" style="border-radius:50%;width:80px;height:80px">
                    </td>
                    <td style="vertical-align:middle;" >{{$user->name}}</td>
                    <td style="vertical-align:middle;"><span >{{$user->role}}</span></td>
                    <td style="vertical-align:middle;">
                        @if ($user->role=='Admin')
                            @if ($user->name =='youssef')
                            @else
                            <form action="{{route('users.writer_role',$user->id)}}" method="POST" class="d-inline" >
                                @csrf
                                <button type="submit" class="btn btn-info btn-sm">Make Writer</button>
                            </form>
                            @endif
                        @else
                        <form action="{{route('users.admin_role',$user->id)}}" method="POST" class="d-inline" >
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm" >Make Admin</button>
                        </form>
                        @endif
                    </td>

                </tr>

                    @empty
                    <p class="card-text m-2 text-center">No Users yet</p>

                    @endforelse
            </tbody>
        </table>
        {{-- end table --}}

    </div>
</div>

@endsection
