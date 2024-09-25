<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CobonPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'edit_cobon']);
        Permission::create(['name' => 'delete_cobon']);
        Permission::create(['name' => 'show_cobon']);
        Permission::create(['name' => 'create_cobon']);
    }
}
