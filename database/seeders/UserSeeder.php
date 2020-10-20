<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
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
            DB::table('users')->insert([
                'name' => $faker->unique()->name,
                'email' => $faker->unique()->email,
                'password' => Hash::make('12345'),
            ]);
        }
    }
}
