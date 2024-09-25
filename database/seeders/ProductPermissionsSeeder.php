<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'edit_product']);
        Permission::create(['name' => 'delete_product']);
        Permission::create(['name' => 'show_product']);
        Permission::create(['name' => 'create_product']);
    }
}
