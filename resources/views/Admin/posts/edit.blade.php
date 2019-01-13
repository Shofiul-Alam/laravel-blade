@extends('layouts.admin')


@section('content')

    <h1>Edit Post</h1>

    <div class="col-sm-3">
        <img class="img-responsive img-rounded" src="{{$post->photo? $post->photo->file : '/img/placeholderimg.jpge'}}" alt="{{$post->title}}">
    </div>

    <div class="col-sm-9">
        {!! Form::model($post, ['method' => 'PATCH', 'action' => ['AdminPostsController@update', $post->id], 'files' => true]) !!}
        
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
            <div class="form-group" style="float:left">
                {!! Form::Submit('Update Post', ['class'=> 'btn btn-primary']) !!} 
            </div>
        {!! Form::close() !!}

        {!! Form::open(['method' => 'DELETE', 'action' => ['AdminPostsController@destroy', $post->id]]) !!}
        <div class="form-group  style="float:left">
            
            {!! Form::submit('Delete Post', ['class' => 'btn btn-danger']) !!}
            
        </div>
    
    {!! Form::close() !!}

        @include('includes.form-error')
    </div>

@stop