@extends('layouts.main')

@section('content')
	{{ Form::open(array('url'=>'users/signin', 'class'=>'form-horizontal')) }}
	    <h2 class="form-signin-heading">Please Login</h2>
	    <div class="form-group"><label for="username" class="col col-md-3 control-label">Email Address</label><div class="col col-md-9">{{ Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Email Address')) }}</div></div>
	    <div class="form-group"><label for="password" class="col col-md-3 control-label">Password</label><div class="col col-md-9">{{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password')) }}</div></div>
	 	<div class="col col-md-9 col-md-offset-3">{{ Form::submit('Login', array('class'=>'btn btn-primary'))}}</div>
		<div class="form-group"><label for="rememberme" class="col col-md-3 control-label">Remember me</label><div class="col col-md-9"><input type="checkbox" name="remember" /></div></div>
	 	
	{{ Form::close() }}
@stop
