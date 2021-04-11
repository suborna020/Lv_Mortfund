<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
// extra 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Category;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Category::factory()->count(10)->create();
    }
}
