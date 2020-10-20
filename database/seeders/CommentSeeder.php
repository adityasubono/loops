<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
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
            // insert data ke table pegawai menggunakan Faker
            DB::table('comments')->insert([
                'post_id' => $i,
                'name' => $faker->name,
                'email' => $faker->unique()->email,
                'website' => $faker->unique()->domainName,
                'comment' => $faker->sentence($nbWords = 10, $variableNbWords = true),

            ]);
        }
    }
}
