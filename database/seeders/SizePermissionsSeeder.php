<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SizePermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'edit_size']);
        Permission::create(['name' => 'delete_size']);
        Permission::create(['name' => 'show_size']);
        Permission::create(['name' => 'create_size']);
    }
}
