<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'edit_admin']);
        Permission::create(['name' => 'delete_admin']);
        Permission::create(['name' => 'show_admin']);
        Permission::create(['name' => 'create_admin']);
    }
}
