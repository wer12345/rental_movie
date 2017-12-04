<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $faker = Faker::create();

       $dataCategories = DB::table('categories')->pluck('id')->toArray();

       foreach(range(1, 80) as $index) {
          DB::table('movies')->insert([
             'categories_id' => $faker->randomElement($dataCategories),
             'title' => $faker->name,
             'year' => rand(2000, 2020),
             'description' => $faker->text
          ]);
       }
    }
}
