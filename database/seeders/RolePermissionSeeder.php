<?php
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

Role::create(['name' => 'visitor']);
Permission::create(['name' => 'view courses']);
Role::findByName('visitor')->givePermissionTo('view courses');
