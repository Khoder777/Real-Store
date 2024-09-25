<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrderPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'edit_order']);
        Permission::create(['name' => 'delete_order']);
        Permission::create(['name' => 'show_order']);
        Permission::create(['name' => 'create_order']);
    }
}
