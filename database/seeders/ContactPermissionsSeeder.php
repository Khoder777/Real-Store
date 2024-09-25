<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ContactPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'edit_contact']);
        Permission::create(['name' => 'delete_contact']);
        Permission::create(['name' => 'show_contact']);
        Permission::create(['name' => 'create_contact']);
    }
}
