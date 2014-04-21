<?php
class PostController extends BaseController {

	protected $layout = "layouts.main";

	public function __construct() {
		$this->beforeFilter('csrf', array('on'=>'post'));
		$this->beforeFilter('auth', array('except'=>'getAllposts'));
	}

	public function getCreate() {
		$fetch_tags = DB::table('tags')->get();
		$fetch_categories = DB::table('categories')->get();
		$this->layout->content = View::make('posts.create')
		->with(array('fetch_tags' => $fetch_tags, 'fetch_categories' => $fetch_categories));
	}

	public function postCreate() {
		$validator = Validator::make(Input::all(), Post::$rules);
		if ($validator->passes()) {
			$post = Post::create(array('title' => Input::get('title'))); // create a Post instance
			$text = Text::create(array('text' => Input::get('text'))); // create a Text instance
			$post->text()->save($text); // same as filling out the post_id field 

			$c = Input::get('categories');
			if (isset($c)) {
				foreach($c as $catId) {
					$cat = Category::find($catId);
					$post->category()->associate($cat)->save(); // associating models (BelongsTo)
				}
			}

			$t = Input::get('tags');
			if (isset($t)) {
				foreach($t as $tagId) {
					$tag = Tag::find($tagId);
					$post->tags()->save($tag);
				}
			}

			$post->user()->associate(Auth::user())->save(); // associating models (BelongsTo)
			return Redirect::to('posts/allposts');
		} else {
			return Redirect::to('posts/create')
			->with('message', 'The following errors occurred')
			->withErrors($validator)
			->withInput();
		}
	}

	public function getAllposts() {
		$allposts = Post::with('text')->orderBy('created_at', 'desc')->paginate(10);
		$categories = DB::table('categories')->get();
		$this->layout->content = View::make('posts.allposts')->with('allposts', $allposts);
		$this->layout->sidebarcat = View::make('posts.categories')->with('categories', $categories);
	}

	public function getMyposts() {
		$myposts = Post::with('text')->where('user_id', Auth::user()->id)->paginate(10); 
		// join execution in order to fetch only the categories in which a has posted in 
		$categories = DB::table('categories')
		->join('posts', 'categories.id', '=', 'posts.category_id')
		->join('users', 'users.id', '=', 'posts.user_id')->where('users.id', Auth::user()->id)
		->select('categories.name','categories.id')
		->get();
		$this->layout->content = View::make('posts.myposts')->with('myposts', $myposts);
		$this->layout->sidebarcat = View::make('posts.mycategories')->with('categories', $categories);
	}

	public function getPost($id) {
		$post = Post::with('text')->where('id', $id)->get();
		$this->layout->content = View::make('posts.post')->with('post', $post);
	}

	public function postFind() {
		$search = Input::get('searchpost');
		$searchform = explode(' ', $search);
		foreach ($searchform as $s) {
			$searchresults = Post::where('title', 'LIKE', '%'.$search.'%')->get();
		}
		$this->layout->content = View::make('posts.searchresults')->with('searchresults', $searchresults);
	}

	public function getCategory($id) {
		$catposts = Post::with('category')->where('category_id', $id)->paginate(10);
		$categories = DB::table('categories')->get();
		$this->layout->content = View::make('posts.category')->with('catposts', $catposts);
	}

	public function getMycategory($id) {
		$catposts = Post::with('category')->where('category_id', $id)->paginate(10);
		$categories = DB::table('categories')->get();
		$this->layout->content = View::make('posts.mycategory')->with('catposts', $catposts);
	}

	public function getEdit($id) {
		$editpost = Post::find($id);
		$fetch_tags = DB::table('tags')->get();
		$fetch_categories = DB::table('categories')->get();
		$this->layout->content = View::make('posts.edit')
		->with(array('fetch_tags' => $fetch_tags, 'fetch_categories' => $fetch_categories, 'editpost' => $editpost));
	}

	public function postUpdate($id) {
		$validator = Validator::make(Input::all(), Post::$rules);
		if ($validator->passes()) {
			$post = Post::find($id);
			$text = Text::where('post_id', '=', $id)->first();
			$post->title = Input::get('title');
			$text->text = Input::get('text');
			$post->text()->save($text); // same as filling out the post_id field 

			$c = Input::get('categories');
			if (isset($c)) {
				foreach($c as $catId) {
					$cat = Category::find($catId);
					$post->category()->associate($cat)->save(); // associating models (BelongsTo)
				}
			}

			$t = Input::get('tags');
			if (isset($t)) {
				foreach($t as $tagId) {
					$tag = Tag::find($tagId);
					$post->tags()->save($tag);
				}
			}

			$post->user()->associate(Auth::user())->save(); // associating models (BelongsTo)
			return Redirect::to('posts/allposts')
			->with('message', 'You have succesfully updated the post');
		} else {
			return Redirect::to('posts/create')
			->with('message', 'The following errors occurred')
			->withErrors($validator)
			->withInput();
		}
	}

	public function postDelete($id) {
		$post = Post::find($id);
		$post->delete();
		return Redirect::to('posts/myposts')
		->with('message', 'You have succesfully deleted this post');
	} 
}