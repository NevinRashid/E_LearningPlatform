<?php

    namespace Database\Seeders;

    use Illuminate\Database\Seeder;

    class DatabaseSeeder extends Seeder
    {
        /**
         * Seed the application's database.
         */
        public function run(): void
        {
            $this->call([
                PermissionTableSeeder::class,  
                DefaultUserSeeder::class,      
                DefaultCategorySeeder::class,      
                DefaultCourseSeeder::class,      
            ]);
        }
    }
