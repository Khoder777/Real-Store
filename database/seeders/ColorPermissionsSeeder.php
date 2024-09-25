<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ColorPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'edit_color']);
        Permission::create(['name' => 'delete_color']);
        Permission::create(['name' => 'show_color']);
        Permission::create(['name' => 'create_color']);
    }
}
