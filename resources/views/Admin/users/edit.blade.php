@extends('layouts.admin')


@section('content')

    <h1>Edit User</h1>

    <div class="col-sm-3">
        <img class="img-responsive img-rounded" src="{{$user->photo? $user->photo->file : '/img/placeholderimg.jpge'}}" alt="">
    </div>

   <div class="col-sm-9">

    {!! Form::model($user, ['method' => 'PATCH', 'action' => ['AdminUsersController@update', $user->id], 'files' => true]) !!}
    
        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class'=> 'form-control']) !!}

            @if ($errors->has('name'))
            <span class="invalid-feedback  text-danger" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
            @endif
        </div>


        <div class="form-group">
            {!! Form::label('email', 'Email:') !!}  
            
            {!! Form::email('email', null, ['class' => 'form-control']) !!}

            @if ($errors->has('email'))
                <span class="invalid-feedback  text-danger" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            {!! Form::label('password', 'Password:') !!}  
            
            {!! Form::password('password', ['class' => 'form-control']) !!}

            @if ($errors->has('password'))
                <span class="invalid-feedback  text-danger" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            {!! Form::label('role_id', 'Role:') !!}  
            
            {!! Form::select('role_id', ['' => 'Select Role'] + $roles, $user->role->id, ['class' => 'form-control']) !!}
            @if ($errors->has('role_id'))
                <span class="invalid-feedback  text-danger" role="alert">
                    <strong>{{ $errors->first('role_id') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            {!! Form::label('is_active', 'Status:') !!}  
            
            {!! Form::select('is_active', array(1 => 'Active', 0 => 'Not Active'), null, ['class' => 'form-control']) !!}

            @if ($errors->has('status'))
            <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $errors->first('status') }}</strong>
            </span>
        @endif
        </div>

        <div class="form-group">
            
            {!! Form::label('file', 'Avatar') !!}
            
            {!! Form::file('file', null, ['class' => 'form-control']) !!}
            
            
        </div>
        <div class="form-group" style="float:left">
            {!! Form::Submit('Update User', ['class'=> 'btn btn-primary']) !!} 
        </div>
    {!! Form::close() !!}
    

    
    {!! Form::open(['method' => 'DELETE', 'action' => ['AdminUsersController@destroy', $user->id]]) !!}
        <div class="form-group  style="float:left"">
            
            {!! Form::submit('Delete User', ['class' => 'btn btn-danger']) !!}
            
        </div>
    
    {!! Form::close() !!}
    
    

    @include('includes.form-error')

@stop
</div>