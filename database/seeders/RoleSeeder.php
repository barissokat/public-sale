<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'admin',
            'display_name' => 'Yönetici',
            'description' => 'Ürün işlemlerini gerçekleştirir',
        ]);
        Role::create([
            'name' => 'user',
            'display_name' => 'Kullanıcı',
            'description' => 'Ürüne teklif verir',
        ]);
    }
}
