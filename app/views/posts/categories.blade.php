@extends('layouts.main')

@section('sidebarcat')
	<h2>Categories</h2>
		<ul>
		@foreach ($categories as $cat)
			<li><a href="category/{{ $cat->id }}">{{ $cat->name }}</a></li>
		@endforeach
		</ul>
@stop
