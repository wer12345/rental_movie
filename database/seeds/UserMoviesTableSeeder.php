<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserMoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $faker = Faker::create();

       $dataMovies = DB::table('movies')->pluck('id')->toArray();

       $dataUser = DB::table('users')->pluck('id')->toArray();

       foreach(range(1, 20) as $index) {
          DB::table('movie_user')->insert([
             'user_id' => $faker->randomElement($dataUser),
             'movies_id' => $faker->randomElement($dataMovies)
          ]);
       }
    }
}
