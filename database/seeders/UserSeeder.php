<?php

namespace Database\Seeders;

use Database\Factories\CustomUserFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->delete();
        CustomUserFactory::times(1)->create();
        User::factory(5)->create();
    }
}
