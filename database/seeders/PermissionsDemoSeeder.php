<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
class PermissionsDemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'edit doctors']);
        Permission::create(['name' => 'read doctors']);
        // create permissions
        Permission::create(['name' => 'edit patients']);
        Permission::create(['name' => 'read patients']);


        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'writer']);
        $role1->givePermissionTo('edit doctors');
        $role1->givePermissionTo('read doctors');
        $role1->givePermissionTo('edit patients');
        $role1->givePermissionTo('read patients');

        $role2 = Role::create(['name' => 'admin']);
        $role2->givePermissionTo('edit doctors');
        $role2->givePermissionTo('read doctors');
        $role2->givePermissionTo('edit patients');
        $role2->givePermissionTo('read patients');

        $role3 = Role::create(['name' => 'Super-Admin']);

        $role4 = Role::create(['name' => 'reader']);
        $role4->givePermissionTo('read doctors');
        $role4->givePermissionTo('read patients');
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
        $user = \App\Models\User::factory()->create([
            'name' => 'Example User',
            'email' => 'test@example.com',
            'password'=>Hash::make('exampleuser'),
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => 'Example Admin User',
            'email' => 'admin@example.com',
            'password'=>Hash::make('exampleuser'),
        ]);
        $user->assignRole($role2);

        $user = \App\Models\User::factory()->create([
            'name' => 'Example Super-Admin User',
            'email' => 'superadmin@example.com',
            'password'=>Hash::make('exampleuser'),
        ]);
        $user->assignRole($role3);
        $user = \App\Models\User::factory()->create([
            'name' => 'Example Reader User',
            'email' => 'readeruser@example.com',
            'password'=>Hash::make('exampleuser'),
        ]);
        $user->assignRole($role4);


    }



}
