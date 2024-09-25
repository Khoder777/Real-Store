<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BrandPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'edit_brand']);
        Permission::create(['name' => 'delete_brand']);
        Permission::create(['name' => 'show_brand']);
        Permission::create(['name' => 'create_brand']);
    }
}
