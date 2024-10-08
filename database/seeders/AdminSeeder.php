<?php

namespace Database\Seeders;

use App\Enums\AdminTypeisEnum;
use App\Models\Project\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Admin::create([
            'name' => 'devloper',
            'phone' => '500000000',
            'email' => 'dev@admin.com',
            'password' => bcrypt("123456"),
            'admin_type' => AdminTypeisEnum::Developer->value,
        ]);

        $admin = Admin::create([
            'name' => 'admin',
            'phone' => '500000000',
            'email' => 'admin@admin.com',
            'password' => bcrypt("123456"),
            'admin_type' => AdminTypeisEnum::Admin->value,
        ]);
    }
}
