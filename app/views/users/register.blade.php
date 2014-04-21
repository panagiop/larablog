@extends('layouts.main')

@section('content')
    {{ Form::open(array('url'=>'users/create', 'class'=>'form-horizontal')) }}
        <h2 class="form-signup-heading">Please Register</h2>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <div class="form-group"><label for="firstname" class="col col-md-3 control-label">Firstname</label><div class="col col-md-9">{{ Form::text('firstname', null, array('class'=>'form-control', 'placeholder'=>'Firstname')) }}</div></div>
        <div class="form-group"><label for="firstname" class="col col-md-3 control-label">Lastname</label><div class="col col-md-9">{{ Form::text('lastname', null, array('class'=>'form-control', 'placeholder'=>'Lastname')) }}</div></div>
        <div class="form-group"><label for="username" class="col col-md-3 control-label">Username</label><div class="col col-md-9">{{ Form::text('username', null, array('class'=>'form-control', 'placeholder'=>'Username')) }}</div></div>
        <div class="form-group"><label for="email" class="col col-md-3 control-label">Email</label><div class="col col-md-9">{{ Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Email Address')) }}</div></div>
        <div class="form-group"><label for="password" class="col col-md-3 control-label">Password</label><div class="col col-md-9">{{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password')) }}</div></div>
        <div class="form-group"><label for="password" class="col col-md-3 control-label">Confirm Password</label><div class="col col-md-9">{{ Form::password('password_confirmation', array('class'=>'form-control', 'placeholder'=>'Confirm Password')) }}</div></div>
        <div class="col col-md-9 col-md-offset-3">{{ Form::submit('Register', array('class'=>'btn btn-primary'))}}</div>
    {{ Form::close() }}
@stop