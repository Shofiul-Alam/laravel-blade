@extends('layouts.admin')


@section('content')

    <h1>Edit Category</h1>

    <div class="row">
        <div class="col-sm-9">
            {!! Form::model($category, ['method' => 'PATCH', 'action' => ['AdminCategoriesController@update', $category->id]]) !!}
            
                <div class="form-group">
                    {!! Form::label('name', 'Category Name:') !!}
                    {!! Form::text('name', null, ['class'=> 'form-control']) !!}

                    @if ($errors->has('name'))
                    <span class="invalid-feedback  text-danger" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
                </div>
                
                <div class="form-group" style="float:left">
                    {!! Form::Submit('Update Category', ['class'=> 'btn btn-primary']) !!} 
                </div>
            {!! Form::close() !!}

            {!! Form::open(['method' => 'DELETE', 'action' => ['AdminCategoriesController@destroy', $category->id]]) !!}
                <div class="form-group"  style="float:left">
                    
                    {!! Form::submit('Delete Category', ['class' => 'btn btn-danger']) !!}
                    
                </div>
            
            {!! Form::close() !!}

            @include('includes.form-error')
        </div>
    </div>

@stop