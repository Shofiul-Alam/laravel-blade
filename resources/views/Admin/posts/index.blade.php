
@extends('layouts.admin')


@section('content')

@if(Session::has('deleted_post'))
      <p class="alert alert-danger">{{session('deleted_post')}}</p>

@endif
    <h1>Posts</h1>
<table class="table">
  <thead>
    <tr>
        <th scope="col">Post Id</th>
        <th scope="col">Post Title</th>
        <th scope="col">Photo</th>
        <th scope="col">Author</th>
        <th scope="col">Category</th>
        <th scope="col">Body</th>
        <th scope="col">Created</th>
        <th scope="col">Updated</th>
    </tr>
  </thead>
  <tbody>

    @if($posts)
      @foreach($posts as $post)
        <tr>
          <td>{{$post->id}}</td>
          <td><a href="{{route('posts.edit', $post->id)}}">{{$post->title}}</a></td>
          <td> 
            <img width="80" src="{{$post->photo? $post->photo->file: 'no photo'}}" alt="{{$post->title}}"> 
          </td>
          <td>{{$post->user->name}}</td>
          <td>{{$post->Category->name}}</td>
          <td>{{$post->body}}</td>
          <td>{{$post->created_at->diffForHumans()}}</td>
          <td>{{$post->updated_at->diffForHumans()}}</td>
        </tr>
      @endforeach
    @endif
  </tbody>
</table>
@stop