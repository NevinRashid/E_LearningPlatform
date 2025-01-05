<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class DefaultUserSeeder extends Seeder
{
    public function run()
    {
        $user = User::firstOrCreate([
            'name' => 'Default Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('12345678'),  
            'image' => 'defaultAdmin.png',
            'phone' => '0000000000',
        ]);
        $user1 = User::firstOrCreate([
            'name' => 'Default Trainer',
            'email' => 'trainer@example.com',
            'password' => bcrypt('12345678'),  
            'image' => 'defaultTrainer.png',
            'phone' => '0000000000',

        ]);
        $user2 = User::firstOrCreate([
            'name' => 'Default Student',
            'email' => 'student@example.com',
            'password' => bcrypt('12345678'),  
            'image' => 'defaultStudent.png',
            'phone' => '0000000000',


        ]);
        $user3 = User::firstOrCreate([
            'name' => 'Default User',
            'email' => 'user@example.com',
            'password' => bcrypt('12345678'),  
            'image' => 'defaultUser.png',
            'phone' => '0000000000',

        ]);

        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $trainerRole = Role::firstOrCreate(['name' => 'trainer']);
        $studentRole = Role::firstOrCreate(['name' => 'student']);
        $usertRole = Role::firstOrCreate(['name' => 'user']);

        $user->assignRole($adminRole);  
        $user1->assignRole($trainerRole);  
        $user2->assignRole($studentRole);  
        $user3->assignRole($usertRole);  

    }
}
