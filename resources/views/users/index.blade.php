@extends("layouts.global")

@section("title") Users list @endsection 

@section("content")

<form action="{{route('users.index')}}">
    <div class="row">
        <div class="col-md-6">
            <input 
                value="{{Request::get('keyword')}}" 
                name="keyword" 
                class="form-control" 
                type="text" 
                placeholder="Masukan email untuk filter..."/>
        </div>
        <div class="col-md-6">
            <input {{Request::get('status') == 'ACTIVE' ? 'checked' : ''}} 
                value="ACTIVE" 
                name="status" 
                type="radio" 
                class="form-control" 
                id="active">
            <label for="active">Active</label>

            <input {{Request::get('status') == 'INACTIVE' ? 'checked' : ''}} 
                value="INACTIVE" 
                name="status" 
                type="radio" 
                class="form-control" 
                id="inactive">
            <label for="inactive">Inactive</label>

            <input 
                type="submit" 
                value="Filter" 
                class="btn btn-primary">
        </div>
    </div>
</form>
<br>

@if(session('status'))
<div class="alert alert-success">
    {{session('status')}}
</div>
@endif 

<div class="col-md-10 text-right">
    <a href="{{route('users.create')}}" class="btn btn-primary">Create user</a>
</div>
<br>
<table class="table table-bordered">
    <thead>
    <tr>
        <th><b>Name</b></th>
        <th><b>Username</b></th>
        <th><b>Email</b></th>
        <th><b>Avatar</b></th>
        <th><b>Status</b></th>
        <th><b>Action</b></th>
    </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->username}}</td>
            <td>{{$user->email}}</td>
            <td>
                @if($user->avatar)
                    <img src="{{asset('storage/app/public/'.$user->avatar)}}" width="70px"/> 
                @else 
                    N/A
                @endif
            </td>
            <td>
                @if($user->status == "ACTIVE")
                    <span class="badge badge-success">
                        {{$user->status}}
                    </span>
                @else 
                    <span class="badge badge-danger">
                        {{$user->status}}
                    </span>
                @endif
            </td>
            <td>
                <a class="btn btn-info text-white btn-sm" href="{{route('users.edit', [$user->id])}}">Edit</a>
                <a href="{{route('users.show', [$user->id])}}" class="btn btn-primary btn-sm">Detail</a>
                <form onsubmit="return confirm('Delete this user permanently?')" class="d-inline" action="{{route('users.destroy', [$user->id])}}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                </form>
            </td>
        </tr>
        @endforeach 
        <tfoot>
          <tr>
            <td colspan=10>
              {{$users->links()}}
            </td>
          </tr>
        </tfoot>
      </tbody>
      <tfoot>
        <tr>
            <td colspan=10>
                {{$users->links()}}
            </td>
        </tr>
        </tfoot>
    </table>

@endsection