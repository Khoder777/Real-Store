<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SliderPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'edit_slider']);
        Permission::create(['name' => 'delete_slider']);
        Permission::create(['name' => 'show_slider']);
        Permission::create(['name' => 'create_slider']);
    }
}
