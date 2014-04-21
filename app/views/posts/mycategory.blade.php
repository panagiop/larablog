@extends('layouts.main')

@section('content')
	<ul>
	@foreach ($catposts as $cat)
		<h2><a href="../post/{{ $cat->id }}">{{ $cat->title }}</a></h2>
		<i>Written by: {{ $cat->user->username }}</i><br>
		<i>Category: {{ $cat->category->name }}</i>
		<blockquote>{{ $cat->text->text }}</blockquote>
	@endforeach
	</ul>
@stop
