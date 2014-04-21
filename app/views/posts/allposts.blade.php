@extends('layouts.main')

@section('content')
	@if (count($allposts) === 0)
		<p>There are no posts yet.</p>
	@else
		@foreach ($allposts as $posts)
			<h3><a href="post/{{ $posts->id }}">{{ $posts->title }}</a></h3>
			<i>Written by: {{ $posts->user->username }}</i><br>
			<i>Category: {{ $posts->category->name }}</i>
			<blockquote>{{ Helpers::postWords($posts->text->text, 5) }}<?php echo '...';?></blockquote>
			<a href="post/{{ $posts->id }}">Read more</a><hr>
		@endforeach
	@endif
	{{ $allposts->links() }}
@stop
