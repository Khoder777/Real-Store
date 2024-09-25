<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubCategoryPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'edit_sub_category']);
        Permission::create(['name' => 'delete_sub_category']);
        Permission::create(['name' => 'show_sub_category']);
        Permission::create(['name' => 'create_sub_category']);
    }
}
