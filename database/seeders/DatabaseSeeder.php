<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\AdminProfile;
use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $get_id = Admin::insertGetId([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('admin'),
            'created_at' => Carbon::now(),
        ]);
        AdminProfile::create([
            "admin_id" => $get_id,
        ]);
    }
}
