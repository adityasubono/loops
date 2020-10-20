<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for($i = 1; $i <= 10; $i++){
            // insert data ke table posts menggunakan Faker
            DB::table('posts')->insert([
                'user_id' => $i,
                'title' => $faker->text($maxNbChars = 100),
                'slug' => $faker->unique()->slug,
                'content' => $faker->paragraph
            ]);
        }

    }
}
