<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoryPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'edit_category']);
        Permission::create(['name' => 'delete_category']);
        Permission::create(['name' => 'show_category']);
        Permission::create(['name' => 'create_category']);
    }
}

