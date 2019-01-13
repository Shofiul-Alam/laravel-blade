
@extends('layouts.admin')


@section('content')

@if(Session::has('deleted_category'))
      <p class="alert alert-danger">{{session('deleted_category')}}</p>

@endif
<h1>Categories</h1>

<div class="row">
        <div class="col-sm-4">
                {!! Form::open(['method' => 'POST', 'action' => 'AdminCategoriesController@store']) !!}
            
                <div class="form-group">
                    {!! Form::label('name', 'Category Name:') !!}
                    {!! Form::text('name', null, ['class'=> 'form-control']) !!}
        
                    @if ($errors->has('name'))
                    <span class="invalid-feedback  text-danger" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
                </div>
                
                
        
                <div class="form-group">
                    {!! Form::Submit('Add Category', ['class'=> 'btn btn-primary']) !!} 
                </div>
            {!! Form::close() !!}
        
            @include('includes.form-error')
        </div>
        
        <div class="col-sm-8">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Category Id</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Created</th>
                        <th scope="col">Updated</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                
                    @if($categories)
                    @foreach($categories as $category)
                        <tr>
                        <td>{{$category->id}}</td>
                        <td><a href="{{route('categories.edit', $category->id)}}">{{$category->name}}</a></td>
                        <td>{{$category->created_at? $category->created_at->diffForHumans(): 'Null'}}</td>
                        <td>{{$category->updated_at? $category->updated_at->diffForHumans(): 'Null'}}</td>
                        <td>
                                {!! Form::open(['method' => 'DELETE', 'action' => ['AdminCategoriesController@destroy', $category->id]]) !!}
                                <div class="form-group"  style="float:left">
                                    
                                    {!! Form::submit('Delete Category', ['class' => 'btn btn-danger']) !!}
                                    
                                </div>
                            
                                {!! Form::close() !!}
                        </td>
                        </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
</div>



@stop