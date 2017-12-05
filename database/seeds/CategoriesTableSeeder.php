<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		$cat1 = new Category();
		$cat1->name = "Computación";
		$cat1->slug = 'computacion';
		$cat1->save();

		$cat2 = new Category();
		$cat2->name = "Servicios";
		$cat2->slug = 'servicios';
		$cat2->save();

		$cat3 = new Category();
		$cat3->name = "Alimentos";
		$cat3->slug = 'alimentos';
		$cat3->save();

		$cat4 = new Category();
		$cat4->name = "Turismo";
		$cat4->slug = 'turismo';
		$cat4->save();
	}
}
