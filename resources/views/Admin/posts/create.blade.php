@extends('layouts.admin')


@section('content')

    <h1>Create Post</h1>

    {!! Form::open(['method' => 'POST', 'action' => 'AdminPostsController@store', 'files' => true]) !!}
    
        <div class="form-group">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null, ['class'=> 'form-control']) !!}

            @if ($errors->has('title'))
            <span class="invalid-feedback  text-danger" role="alert">
                <strong>{{ $errors->first('title') }}</strong>
            </span>
        @endif
        </div>
        
        

        <div class="form-group">
            {!! Form::label('category_id', 'Cateogory:') !!}  
            
            {!! Form::select('category_id', ['' => 'Select Category'] + $categories, null, ['class' => 'form-control']) !!}
            @if ($errors->has('category_id'))
                <span class="invalid-feedback  text-danger" role="alert">
                    <strong>{{ $errors->first('category_id') }}</strong>
                </span>
            @endif
        </div>
        

        <div class="form-group">
            {!! Form::label('body', 'Description:') !!}  
            
            {!! Form::textarea('body', null, ['class' => 'form-control', 'rows'=>5]) !!}

            @if ($errors->has('body'))
                <span class="invalid-feedback  text-danger" role="alert">
                    <strong>{{ $errors->first('body') }}</strong>
                </span>
            @endif
        </div>

        

        <div class="form-group">
            
            {!! Form::label('file', 'Avatar') !!}
            
            {!! Form::file('file', null, ['class' => 'form-control']) !!}
            
        </div>
        <div class="form-group">
            {!! Form::Submit('Add Post', ['class'=> 'btn btn-primary']) !!} 
        </div>
    {!! Form::close() !!}

    @include('includes.form-error')

@stop