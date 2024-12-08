<?php

namespace Database\Seeders;

use App\Models\AdminStand;
use App\Models\Badge;
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

        User::factory()->create([
            'name' => 'Asil',
            'email' => 'asil',
            'role' => 'super-admin',
        ]);
        User::factory()->create([
            'name' => 'Website Admin',
            'email' => 'website',
            'role' => 'admin',
        ]);
        User::factory()->create([
            'name' => 'Cyber Admin',
            'email' => 'cyber',
            'role' => 'admin',
        ]);
        User::factory()->create([
            'name' => 'IoT Admin',
            'email' => 'iot',
            'role' => 'admin',
        ]);
        User::factory()->create([
            'name' => 'Game Admin',
            'email' => 'game',
            'role' => 'admin',
        ]);
        User::factory()->create([
            'name' => 'GIS Admin',
            'email' => 'gis',
            'role' => 'admin',
        ]);
        User::factory()->create([
            'name' => 'Mobile Admin',
            'email' => 'mobile',
            'role' => 'admin',
        ]);
        User::factory()->create([
            'name' => 'Troubleshooting Admin',
            'email' => 'troubleshooting',
            'role' => 'admin',
        ]);
        User::factory()->create([
            'name' => 'Networking Admin',
            'email' => 'networking',
            'role' => 'admin',
        ]);
        User::factory()->create([
            'name' => 'Multimedia Admin',
            'email' => 'Multimedia',
            'role' => 'admin',
        ]);
        User::factory()->create([
            'name' => 'Resepsionis',
            'email' => 'resepsionis',
            'role' => 'resepsionis',
        ]);
        User::factory()->create([
            'name' => 'Alif Nugraha',
            'email' => 'alifnugraha',
        ]);
        User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'admin',
            'role' => 'super-admin',
        ]);
        
        AdminStand::create(['user_id' => 2, 'stand'=> 'Website']);
        AdminStand::create(['user_id' => 3, 'stand'=> 'Cyber']);
        AdminStand::create(['user_id' => 4, 'stand'=> 'IoT']);
        AdminStand::create(['user_id' => 5, 'stand'=> 'Game']);
        AdminStand::create(['user_id' => 6, 'stand'=> 'GIS']);
        AdminStand::create(['user_id' => 7, 'stand'=> 'Mobile']);
        AdminStand::create(['user_id' => 8, 'stand'=> 'Troubleshooting']);
        AdminStand::create(['user_id' => 9, 'stand'=> 'Networking']);
        AdminStand::create(['user_id' => 10, 'stand'=> 'Multimedia']);

        Badge::create([
            'user_id' => 12,
        ]);
    }
}
