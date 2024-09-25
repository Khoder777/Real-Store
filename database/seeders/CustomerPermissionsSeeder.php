<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CustomerPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'edit_customer']);
        Permission::create(['name' => 'delete_customer']);
        Permission::create(['name' => 'show_customer']);
        Permission::create(['name' => 'create_customer']);
    }
}
