<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
// extra 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Fundraiser;
class FundraiserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Fundraiser::factory()->count(5)->create();
    }
}
