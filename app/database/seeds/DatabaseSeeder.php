<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UserTableSeeder');		
		$this->call('TagTableSeeder');
		$this->call('CategoryTableSeeder');
		$this->command->info('User, Tag and Category tables seeded!');
	}

}

class UserTableSeeder extends Seeder {
	public function run() {
		$user1 = new User;
		$user1->username = "pan";
		$user1->password = Hash::make("123456");
		$user1->email = "pan@pan.com";
		$user1->firstname = "pan";
		$user1->lastname = "pan";
		$user1->save();

		$user2 = new User;
		$user2->username = "user2";
		$user2->password = Hash::make("123456");
		$user2->email = "user2@user2.com";
		$user2->firstname = "user2";
		$user2->lastname = "user2";
		$user2->save();
	}
}

class TagTableSeeder extends Seeder {
	public function run() {
		for ($i = 1; $i < 3; $i++) {
			$tag = new Tag;
			$tag->name = "tag$i";
			$tag->save();
		}
	}
}

class CategoryTableSeeder extends Seeder {
	public function run() {
		for ($i = 1; $i < 3; $i++) {
			$cat = new Category;
			$cat->name = "category$i";
			$cat->save();
		}
	}
}