<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;


class BlacklistedClientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 50; $i++) {
            DB::table('blacklisted_clients')->insert([
                'account_name' => $faker->name,
                'client_type' => $faker->randomElement(['business', 'individual']),
                'institution' => $faker->company,
                'account_manager' => $faker->name,
                'date_blacklisted' => $faker->dateTimeBetween('-5 years', 'now')->format('Y-m-d'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
