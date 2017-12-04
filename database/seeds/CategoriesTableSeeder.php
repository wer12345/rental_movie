<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $data = [
       ['name' => 'Comedy'],
       ['name' => 'Horror'],
       ['name' => 'Action'],
       ['name' => 'Drama'],
       ['name' => 'Romance']
    ];

       DB::table('categories')->insert($data);
    }
}
