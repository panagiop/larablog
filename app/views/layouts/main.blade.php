<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LaraBlog</title>
    {{ HTML::style('css/main.css')}}
    {{ HTML::style('css/bootstrap.css')}}
    {{ HTML::script('js/jquery-1.11.0.js')}}
    {{ HTML::script('js/bootstrap.js')}}
  </head>
  <body>
  	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <ul class="nav navbar-nav"> 
            	@if(!Auth::check())
                	<li>{{ HTML::link('users/register', 'Register') }}</li>   
                	<li>{{ HTML::link('users/login', 'Login') }}</li>
               	@else
                  <li>{{ HTML::link('#', Auth::user()->username) }}</li>
                  <li>{{ HTML::link('posts/myposts', 'My posts') }}</li>
                  <li>{{ HTML::link('posts/allposts', 'View all the posts') }}</li>
               		<li>{{ HTML::link('posts/create', 'Create a new post') }}</li>
                  <li>
                    <div class="searchform">
                      {{ Form::open(array('url'=>'posts/find', 'class'=>'form-horizontal')) }}
                        {{ Form::text('searchpost', null, array('class'=>'form-control', 'placeholder'=>'Search for an article')) }}
                      {{ Form::close() }}
                    </div>
                  </li>
				      @endif   
            </ul>
            <ul class="nav navbar-nav pull-right">
              @if(Auth::check())
                <li>{{ HTML::link('users/logout', 'logout') }}</li>
              @endif   
            </ul>
    	</div>
    </nav>
    <div class="container">
      <div class="row">
        <div class="col-md-9">
            @if(Session::has('message'))
                <p class="alert alert-warning">{{ Session::get('message') }}</p>
            @endif
            @yield('content')
        </div>
        <div class="col-md-3">
           @yield('sidebarcat')
        </div>
      </div>
    </div>
  </body>
</html>