@extends('layouts.main')

@section('content')

    {{ Form::open(array('url'=>'posts/create', 'class'=>'form-horizontal')) }}
        <h2 class="form-signup-heading">New post</h2>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <div class="form-group"><label for="title" class="col col-md-3 control-label">Title</label><div class="col col-md-9">{{ Form::text('title', null, array('class'=>'form-control', 'placeholder'=>'Post title')) }}</div></div>
        <div class="form-group"><label for="text" class="col col-md-3 control-label">Text</label><div class="col col-md-9">{{ Form::textarea('text', null, array('class'=>'form-control', 'placeholder'=>'Main text')) }}</div></div>
        <div class="form-group"><label for="categories" class="col col-md-3 control-label">Category</label><div class="col col-md-9">
            <select name="categories[]" id="categories" size="6" class="form-control">
                @foreach ($fetch_categories as $categories)
                    <option value="{{ $categories->id }}">{{ $categories->name }}</option>
                @endforeach
                </select>
            </div>
        </div>
        <div class="form-group"><label for="tags" class="col col-md-3 control-label">Tags</label><div class="col col-md-9">
            <select name="tags[]" id="tags" size="6" class="form-control" multiple>
                @foreach ($fetch_tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
                </select>
            </div>
        </div>
        <div class="col col-md-9 col-md-offset-3">{{ Form::submit('Create', array('class'=>'btn btn-primary'))}}</div>
    
    {{ Form::close() }}

@stop