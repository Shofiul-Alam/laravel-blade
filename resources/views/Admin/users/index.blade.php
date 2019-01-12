
@extends('layouts.admin')


@section('content')

    @if(Session::has('deleted_user'))
      <p class="alert alert-danger">{{session('deleted_user')}}</p>

    @endif
    <h1>Users</h1>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Photo</th>
      <th scope="col">Email</th>
      <th>Role</th>
      <th>Active</th>
      <th scope="col">Created</th>
      <th scope="col">Updated</th>
    </tr>
  </thead>
  <tbody>

    @if($users)
      @foreach($users as $user)
        <tr>
          <td>{{$user->id}}</td>
          <td><a href="{{route('users.edit', $user->id)}}">{{$user->name}}</a></td>
          <td> 
            <img width="80" src="{{$user->photo? $user->photo->file: 'no photo'}}" alt="{{$user->name}}"> 
          </td>
          <td>{{$user->email}}</td>
          <td>{{$user->role->name}}</td>
          <td>{{$user->is_active? 'Active' : 'Deactivated'}}</td>
          <td>{{$user->created_at->diffForHumans()}}</td>
          <td>{{$user->updated_at->diffForHumans()}}</td>
        </tr>
      @endforeach
    @endif
  </tbody>
</table>
@stop