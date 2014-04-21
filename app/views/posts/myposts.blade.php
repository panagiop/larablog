@extends('layouts.main')

@section('content')
	@if (count($myposts) === 0)
		You have no posts yet!!
	@else
		@foreach ($myposts as $posts)
			<h3><a href="post/{{ $posts->id }}">{{ $posts->title }}</a></h3>
			<i>Written by: {{ $posts->user->username }}</i><br>
			<i>Category: {{ $posts->category->name }}</i>
			<!-- postWords is a custom function resides in app/customclasses/Helpers.php 
			It returns the initial post limited to specified number given as a second argument-->
			<blockquote>{{ Helpers::postWords($posts->text->text, 5) }}<?php echo '...';?></blockquote>
			<a href="post/{{ $posts->id }}">Read more</a><br><br>
			<a href="edit/{{ $posts->id }}" class="btn btn-primary">Edit</a>
			<a href="#" class="btn btn-danger" data-toggle="modal" data-target="#smallmodal">Delete</a><hr>
			<div class="modal fade" id="smallmodal" tabindex="-1" role="dialog" aria-labelledby="smallModal" aria-hidden="true">
		  		<div class="modal-dialog modal-sm">
		    		<div class="modal-content">
		      			<div class="modal-header">
		        			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		        			<h4 class="modal-title" id="myModalLabel">Delete post</h4>
		      			</div>
		      			<div class="modal-body">
		        			<p>Are you sure you want to delete this post?</p>
		      			</div>
		      			<div class="modal-footer">
		      				{{ Form::open(array('url'=>array('posts/delete', $posts->id))) }}
					        	<button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
					        	{{ Form::submit('Yes', array('class'=>'btn btn-danger'))}}
					        {{ Form::close() }}
		      			</div>
		    		</div>
		  		</div>
			</div>
		@endforeach
	@endif
@stop
