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
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Lisa',
            'email' => 'lisa',
            'role' => 'admin',
        ]);
        User::factory()->create([
            'name' => 'Alisa',
            'email' => 'alisa',
            'role' => 'admin',
        ]);
        User::factory()->create([
            'name' => 'Asil',
            'email' => 'asil',
            'role' => 'super-admin',
        ]);
        User::factory()->create([
            'name' => 'Alif Nugraha',
            'email' => 'alifnugraha',
        ]);
        User::factory()->create([
            'name' => 'Usamah Robbani',
            'email' => 'usamah',
        ]);
        
        AdminStand::create(['user_id' => 1, 'stand'=> 'mobile']);
        AdminStand::create(['user_id' => 2, 'stand'=> 'cyber']);

        Badge::create(['user_id' => 4]);
        Badge::create(['user_id' => 5]);
    }
}
