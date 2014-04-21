<?php
class UserController extends BaseController {

	protected $layout = "layouts.main";

	public function __construct() {
		$this->beforeFilter('csrf', array('on'=>'post'));
		$this->beforeFilter('auth', array('only'=>array('getAllposts')));
	}

	public function getRegister() {
    	$this->layout->content = View::make('users.register');
	}

	public function postCreate() {
		$validator = Validator::make(Input::all(), User::$rules);
		if ($validator->passes()) {
			$user = new User;
			$user->username = Input::get('username');
			$user->firstname = Input::get('firstname');
			$user->lastname = Input::get('lastname');
			$user->email = Input::get('email');
			$user->password = Hash::make(Input::get('password'));
			$user->save();
			return Redirect::to('users/login')
			->with('message', 'Thanks for registering!');
		} else {
			return Redirect::to('users/register')
			->with('message', 'The following errors occurred')
			->withErrors($validator)->withInput();
		}
	}

	public function getLogin() {
		$this->layout->content = View::make('users.login');
	}

	public function postSignin() {
		$remember = (Input::has('remember')) ? true : false; 
		$auth = Auth::attempt(array('email'=>Input::get('email'), 'password'=>Input::get('password')), $remember);
		if ( $auth ) {
			return Redirect::to('posts/allposts')
			->with('message', 'You are now logged in!');
		} else {
			return Redirect::to('users/login')
			->with('message', 'email/password wrong combination')
			->withInput();
		}
	}

	public function getLogout() {
		Auth::logout();
		return Redirect::to('users/login')
		->with('message', 'You have succesfully logged out');
	}
}