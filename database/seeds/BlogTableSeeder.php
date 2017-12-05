<?php

use App\Blog;
use Illuminate\Database\Seeder;

class BlogTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		$post1 = new Blog();
		$post1->title = 'Introduction';
		$post1->body = 'Laravel includes a simple method of seeding your database with test data using seed classes. All seed classes are stored in the database/seeds directory. Seed classes may have any name you wish, but probably should follow some sensible convention, such as UsersTableSeeder, etc. By default, a  DatabaseSeeder class is defined for you. From this class, you may use the call method to run other seed classes, allowing you to control the seeding order.';
		$post1->save();

		$post2 = new Blog();
		$post2->title = 'Writing Seeders';
		$post2->body = 'To generate a seeder, execute the make:seeder Artisan command. All seeders generated by the framework will be placed in the database/seeds directory: php artisan make:seeder UsersTableSeeder. A seeder class only contains one method by default: run. This method is called when the db:seed Artisan command is executed. Within the run method, you may insert data into your database however you wish. You may use the query builder to manually insert data or you may use Eloquent model factories.';
		$post2->save();

		$post3 = new Blog();
		$post3->title = 'Using Model Factories';
		$post3->body = 'Of course, manually specifying the attributes for each model seed is cumbersome. Instead, you can use model factories to conveniently generate large amounts of database records. First, review the model factory documentation to learn how to define your factories. Once you have defined your factories, you may use the factory helper function to insert records into your database.';
		$post3->save();

		$post4 = new Blog();
		$post4->title = 'Calling Additional Seeders';
		$post4->body = 'Within the DatabaseSeeder class, you may use the call method to execute additional seed classes. Using the call method allows you to break up your database seeding into multiple files so that no single seeder class becomes overwhelmingly large. ';
		$post4->save();
	}
}
