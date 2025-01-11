<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class DefaultCategorySeeder extends Seeder
{
    public function run()
    {
        Category::create([
            'name' => 'Web Development',
            'image' => 'default-image.jpg',
        ]);
        
        Category::create([
            'name' => 'Mobile Development',
            'image' => 'default-image.jpg',
        ]);
        
     }
}
