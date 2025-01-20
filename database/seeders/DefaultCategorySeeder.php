<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class DefaultCategorySeeder extends Seeder
{
    public function run()
    {
        $imageWeb=asset('categories/web.png');
        $imageMobile=asset('categories/mobile.jpeg');
        $imageLife=asset('categories/life_skills.png');
        $imageLanguage=asset('categories/languages.jpg');
        $imageAccounting=asset('categories/accounting.jpg');
        $imageGraphic=asset('categories/graphic.jpeg');

        Category::create([
            'name' =>'Web Development',
            'image' =>  $imageWeb, 
        ]);
        Category::create([
            'name' =>'Mobile Development',
            'image' =>  $imageMobile, 
        ]);

        Category::create([
            'name' =>'Life skills',
            'image' =>  $imageLife, 
        ]);

        Category::create([
            'name' =>'Languages',
            'image' =>  $imageLanguage, 
        ]);
        
        Category::create([
            'name' =>'Graphic',
            'image' =>  $imageGraphic, 
        ]);
        
        Category::create([
            'name' =>'Accounting',
            'image' =>  $imageAccounting, 
        ]);
    }
}
