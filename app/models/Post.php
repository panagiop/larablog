<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Post extends Eloquent implements UserInterface, RemindableInterface {

	public static $rules = array(
		'title'=>'required|between:2,200',
		'text'=>'required|between:2,400'
    );

	protected $table = 'posts';

	public function getAuthIdentifier() {
		return $this->getKey();
	}

	public function getAuthPassword() {
		return $this->password;
	}

	public function getReminderEmail() {
		return $this->email;
	}

	protected $fillable = array('title');

	// One to Many relationship with User
	public function user() {
		return $this->belongsTo('User');
	}

	// One to One relationship with Text
	public function text() {
		return $this->hasOne('Text');
	}

	// One to Many relationship with Category
	public function category() {
		return $this->belongsTo('Category');
	}

	// Many to Many relationship with Category
	public function tags() {
        return $this->belongsToMany('Tag');
    }
}