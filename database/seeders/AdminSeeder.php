<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
// extra 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert(
            [
            // 'admin_name' => $faker->name,
            'admin_name' => 'Suborna',
            'admin_email' => 'q@gmail.com',
            'admin_username' => 'q',
            'admin_password' => '1234',
            'admin_status' => '1',

            ]
    );
    }
}
