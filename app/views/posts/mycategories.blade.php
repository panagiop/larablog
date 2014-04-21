@extends('layouts.main')

@section('sidebarcat')
	<h2>My Categories</h2>
		<ul>
		@foreach ($categories as $cat)
			<li><a href="mycategory/{{ $cat->id }}">{{ $cat->name }}</a></li>
		@endforeach
		</ul>
@stop
