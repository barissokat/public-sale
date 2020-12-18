<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
        ]);

        \App\Models\Product::factory(10)->create();
        \App\Models\User::factory()->create(['role_id' => 1]);
        \App\Models\User::factory()->create(['role_id' => 2]);
    }
}
