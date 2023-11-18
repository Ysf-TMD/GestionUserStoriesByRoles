<?php

namespace Database\Seeders;

use App\Models\UserStorie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserStorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserStorie::factory()->count(60)->create();
    }
}
