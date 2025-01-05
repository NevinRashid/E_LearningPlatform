<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\Category;
class DefaultCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // إضافة كورسات افتراضية
        $courses=[
            Course::create([
                'title' => 'Laravel for Beginners',
                'description' => 'Learn the basics of Laravel, a popular PHP framework.',
                'level' => 'Beginner',
                'price' => 100,
                'capacity' => 30,
                'start_date' => now(),
                'category_id' => 1, // تأكد من أن هناك تصنيف بهذا المعرف
            ]),

            Course::create([
                'title' => 'Advanced Laravel',
                'description' => 'Deep dive into advanced Laravel concepts and features.',
                'level' => 'Advanced',
                'price' => 200,
                'capacity' => 25,
                'start_date' => now(),
                'category_id' => 1, // تأكد من أن هناك تصنيف بهذا المعرف
            ]),

            Course::create([
                'title' => 'React for Beginners',
                'description' => 'Learn the basics of React.js for building modern web applications.',
                'level' => 'Beginner',
                'price' => 120,
                'capacity' => 50,
                'start_date' => now(),
                'category_id' => 2, // تأكد من أن هناك تصنيف بهذا المعرف
            ]),
        ];
        $category1=Category::where('id',$courses[0]->category_id)->first();
        $category2=Category::where('id',$courses[1]->category_id)->first();
        $category3=Category::where('id',$courses[2]->category_id)->first();
        $category1->courses()->save($courses[0]);
        $category2->courses()->save($courses[1]);
        $category3->courses()->save($courses[2]);



    }
}
