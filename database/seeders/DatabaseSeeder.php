<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Jobs;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create a user with specified name and email
        $user = User::factory()->create([
            'name' => 'Real Good',
            'email' => 'realgood8080@gmail.com'
        ]);

        // Uncomment the following lines to create another user
        // $user = User::factory()->create([
        //     'name' => 'Goodnews',
        //     'email' => 'gilbertozioma0@gmail.com'
        // ]);

        // Create 10 jobs and associate them with the user created above
        Jobs::factory(10)->create([
            'user_id' => $user->id
        ]);
    }
}

