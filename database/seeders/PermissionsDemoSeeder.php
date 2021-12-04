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
       // create permissions
       Permission::create(['name' => 'edit departments']);
       Permission::create(['name' => 'read departments']);
        // create permissions
        Permission::create(['name' => 'edit exams']);
        Permission::create(['name' => 'read exams']);
         // create permissions
        Permission::create(['name' => 'edit specialties']);
        Permission::create(['name' => 'read specialties']);
          // create permissions
        Permission::create(['name' => 'edit appointments']);
        Permission::create(['name' => 'read appointments']);




        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'writer']);
        $role1->givePermissionTo('edit doctors');
        $role1->givePermissionTo('read doctors');
        $role1->givePermissionTo('edit patients');
        $role1->givePermissionTo('read patients');
        $role1->givePermissionTo('edit departments');
        $role1->givePermissionTo('read departments');
        $role1->givePermissionTo('edit exams');
        $role1->givePermissionTo('read exams');
        $role1->givePermissionTo('edit specialties');
        $role1->givePermissionTo('read specialties');
        $role1->givePermissionTo('edit appointments');
        $role1->givePermissionTo('read appointments');

        $role2 = Role::create(['name' => 'admin']);
        $role2->givePermissionTo('edit doctors');
        $role2->givePermissionTo('read doctors');
        $role2->givePermissionTo('edit patients');
        $role2->givePermissionTo('read patients');
        $role2->givePermissionTo('edit departments');
        $role2->givePermissionTo('read departments');
        $role2->givePermissionTo('edit exams');
        $role2->givePermissionTo('read exams');
        $role2->givePermissionTo('edit specialties');
        $role2->givePermissionTo('read specialties');
        $role2->givePermissionTo('edit appointments');
        $role2->givePermissionTo('read appointments');


        $role3 = Role::create(['name' => 'Super-Admin']);

        $role4 = Role::create(['name' => 'reader']);
        $role4->givePermissionTo('read doctors');
        $role4->givePermissionTo('read patients');
        $role4->givePermissionTo('read departments');
        $role4->givePermissionTo('read exams');
        $role4->givePermissionTo('read specialties');
        $role4->givePermissionTo('read appointments');

        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
        $user = \App\Models\User::factory()->create([
            'name' => 'writer',
            'email' => 'writer@example.com',
            'password'=>Hash::make('exampleuser'),
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password'=>Hash::make('exampleuser'),
        ]);
        $user->assignRole($role2);

        $user = \App\Models\User::factory()->create([
            'name' => 'superadmin',
            'email' => 'superadmin@example.com',
            'password'=>Hash::make('exampleuser'),
        ]);
        $user->assignRole($role3);
        $user = \App\Models\User::factory()->create([
            'name' => 'reader',
            'email' => 'reader@example.com',
            'password'=>Hash::make('exampleuser'),
        ]);
        $user->assignRole($role4);


    }



}
