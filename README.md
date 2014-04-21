larablog
========

A simple blog made with Laravel 4.1 and Bootstrap 3. A user can create an account and create/read/update/delete posts selecting the category in which will be residing in. A user can also read other user's posts.

As far as it concerns the database schema, the following relationships applied:
User - Post (One-To-Many) <br>
Post - Tag (Many-To-many) <br>
Post - Text (One-To-One) <br>
Category - Post (One-To-Many) <br>

<h3>Installation steps</h3>
1) Clone the repo <br>
2) Change the /config/database.php file according to your db settings <br>
3) Run the following command (in application's root folder): php artisan migrate <br>
4) Same as the previous step run the following command: php artisan db:seed <br>
5) Login with username: pan@pan.com and password: 123456 or with username: user2@user2.com and password: 123456 <br>
6) Go to "create a new post" to create a new post.
