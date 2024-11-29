<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
class categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(['name'=>'Computer Science']);
        Category::create(['name'=>'Programming']);
        Category::create(['name'=>'AI']);
        Category::create(['name'=>'Cyber Security']);
        Category::create(['name'=>'Mathematics']);
        Category::create(['name'=>'Physics']);
        Category::create(['name'=>'Chemistry']);
        Category::create(['name'=>'Medical Science']);
        Category::create(['name'=>'Literature and Arts']);
        Category::create(['name'=>'Languages']);







    }
}
