<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolePermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      // create permissions
      Permission::create(['name' => 'edit_role']);
      Permission::create(['name' => 'delete_role']);
      Permission::create(['name' => 'show_role']);
      Permission::create(['name' => 'create_role']);
    }
}
