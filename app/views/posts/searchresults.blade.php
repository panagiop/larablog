@extends('layouts.main')

@section('content')
	@foreach ($searchresults as $search)
		<h3><a href="post/{{ $search->id }}">{{ $search->title }}</a></h3>
		<i>Written by: {{ $search->user->username }}</i><br>
		<i>Category: {{ $search->category->name }}</i>
		<blockquote>{{ $search->text->text }}</blockquote>
	@endforeach
@stop