<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionTableSeeder extends Seeder
{
    public function run()
    {
    
        $permissions = [
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'trainer-list',
            'trainer-create',
            'trainer-edit',
            'trainer-delete',
            'user-activate',
            'user-ban',
            'user-assign-role',
            'course-list',
            'course-create',
            'course-edit',
            'course-delete',
            'course-publish',
            'course-register',
            'course-unregister',
            'comment-list',
            'comment-create',
            'comment-edit',
            'comment-delete',
            'comment-moderate',
            'rating-list',
            'rating-create',
            'rating-edit',
            'rating-delete',
            'rating-moderate',
            'category-list',
            'category-create',
            'category-edit',
            'category-delete',
            'file-list',
            'file-create',
            'file-edit',
            'file-delete',
            'dashboard-access',
            'settings-manage',
            'register',
            'login',
            'logout'
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]); 
        }

        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo($permissions);

        $trainerRole = Role::create(['name' => 'trainer']);
        $trainerRole->givePermissionTo([
            'course-list',
            'course-create',
            'course-edit',
            'category-list',
            'register',
            'login',
            'logout',
            'trainer-list',
            'course-register',
            'course-unregister',
            'comment-list',
            'comment-create',
            'comment-edit',
            'comment-delete',
            'rating-list',
            'rating-create',
            'rating-edit',
            'file-create',
            'file-edit',
            'file-delete',
        ]);

        $studentRole = Role::create(['name' => 'student']);
        $studentRole->givePermissionTo([
            'course-list',
            'category-list',
            'register',
            'login',
            'logout',
            'trainer-list',
            'course-register',
            'course-unregister',
            'comment-create',
            'comment-edit',
            'comment-delete',
            'rating-create',
            'rating-edit',
            'file-create',
            'file-edit',
            'file-delete',
        ]);

        $userRole = Role::create(['name' => 'user']);
        $userRole->givePermissionTo([
            'course-list',
            'category-list',
            'register',
            'login',
            'trainer-list'
        ]);
    }
    }
