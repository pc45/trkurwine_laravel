<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        foreach(Role::all() as $role) {
            $users = User::factory(10)->create();
            foreach($users as $user){
                $user->assignRole($role);

                $permissions = Permission::pluck('id','id')->all();

                $role->syncPermissions($permissions);
            }
        }

    }
}
