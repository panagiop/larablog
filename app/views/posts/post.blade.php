@extends('layouts.main')

@section('content')
	@foreach($post as $p)
	<h2>{{ $p->title }}</h2>
	<i>Written by: {{ $p->user->username }}</i><br>
	<i>Category: {{ $p->category->name }}</i>
	<blockquote>{{ $p->text->text }}</blockquote>
	@endforeach
@stop