<?php

namespace Database\Seeders;

use App\Models\Todo;
use App\Models\User;
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
        
        User::factory()->create([
            'email' => 'user@example.com'
        ]);

        Todo::factory(10)->create([
            'user_id' => 1
        ]);

        \App\Models\User::factory(3)->create();

        Todo::factory(5)->create([
            'user_id' => 2
        ]);
    }
}
