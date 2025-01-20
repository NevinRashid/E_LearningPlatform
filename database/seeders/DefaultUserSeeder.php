<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class DefaultUserSeeder extends Seeder
{
    public function run()
    {
        $image= asset('images/face.webp');
        $admin = User::firstOrCreate([
            'name' => 'Nevin',
            'email' => 'nevin@gmail.com',
            'password' => bcrypt('123456789'),  
            'image' => $image,
            'phone' => '0000000000',
        ]);

        $trainer = User::firstOrCreate([
            'name' => 'Rola',
            'email' => 'rola@gmail.com',
            'password' => bcrypt('123456789'),  
            'image' => $image,
            'phone' => '0000000000',
        ]);

        $student = User::firstOrCreate([
            'name' => 'Mouaz',
            'email' => 'mouaz@gmail.com',
            'password' => bcrypt('123456789'),  
            'image' => $image,
            'phone' => '0000000000',
        ]);

        $user = User::firstOrCreate([
            'name' => 'Tareq',
            'email' => 'tareq@gmail.com',
            'password' => bcrypt('123456789'),  
            'image' => $image,
            'phone' => '0000000000',
        ]);

        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $trainerRole = Role::firstOrCreate(['name' => 'trainer']);
        $studentRole = Role::firstOrCreate(['name' => 'student']);
        $usertRole = Role::firstOrCreate(['name' => 'user']);

        $admin->assignRole($adminRole);  
        $trainer->assignRole($trainerRole);  
        $student->assignRole($studentRole);  
        $user->assignRole($usertRole);  

    }
}
