<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Admin',
        //     'email' => 'admin@admin.com',
        //     'password' => '123123123',
        // ]);
        $this->call([
          BrandPermissionsSeeder::class,
          ColorPermissionsSeeder::class,
          SizePermissionsSeeder::class,
          CategoryPermissionsSeeder::class,
          SubCategoryPermissionsSeeder::class,
          SliderPermissionsSeeder::class,
          RolePermissionsSeeder::class,
          CobonPermissionsSeeder::class,
          ShipPermissionsSeeder::class,
          ContactPermissionsSeeder::class,
          ProductPermissionsSeeder::class,
          OrderPermissionsSeeder::class,
          CustomerPermissionsSeeder::class,
          AdminPermissionsSeeder::class,
        ]);
    }
}
