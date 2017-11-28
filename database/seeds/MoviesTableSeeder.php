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

       foreach(range(1, 10) as $index) {
          DB::table('movies')->insert([
             'title' => $faker->name,
             'year' => rand(2000, 2020),
             'description' => $faker->text
          ]);
       }
    }
}
