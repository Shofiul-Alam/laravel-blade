@extends('layouts.admin')


@section('content')

    <h1>Create User</h1>

    {!! Form::open(['method' => 'POST', 'action' => 'AdminUsersController@create']) !!}
    
        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('title', null, ['class'=> 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::Submit('Add User', ['class'=> 'btn btn-primary']) !!} 
        </div>
    {!! Form::close() !!}

@stop