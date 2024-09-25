<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ShipPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'edit_ship']);
        Permission::create(['name' => 'delete_ship']);
        Permission::create(['name' => 'show_ship']);
        Permission::create(['name' => 'create_ship']);
    }
}
