<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class FactorySeederUser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('ab_user')->truncate();
        $faker = Factory::create();
        for($i=0; $i<10000; $i++){
            DB::table('ab_user')->insert([
                'id' => $i,
                'ab_name' => $faker->name,
                'ab_mail' => $faker->unique()->email,
                'ab_password' => Hash::make($faker->word),
            ]);
        }
    }
}
