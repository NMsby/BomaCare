<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Roles
        $superadmin = Role::create(['name' => 'superadmin']);
        $admin = Role::create(['name' => 'admin']);
        $staff = Role::create(['name' => 'staff']);
        $homeowner = Role::create(['name' => 'homeowner']);
        $domesticworker = Role::create(['name' => 'domesticworker']);

        // Create permissions
        Permission::create(['name' => 'manage roles']);
        Permission::create(['name' => 'manage permissions']);
        Permission::create(['name' => 'manage users']);

        // Assign permissions to roles
        $superadmin->givePermissionTo(Permission::all());
        $admin->givePermissionTo(['manage roles', 'manage permissions', 'manage users']);
    }
}
