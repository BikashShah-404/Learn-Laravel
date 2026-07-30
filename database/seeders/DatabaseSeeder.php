<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// The problem is , if we want to fresh start our database, we would run php artisan migrate:fresh but then we lose our data , and then we would have to run factories for all of the tables in which we want data as php artisan tinker and then App\Models\User::factory(100)->create(); which is not idle , we would want to run this
// php artisan migrate:fresh --seed to populate the tables in one go, which can be done using database seeders.
// to only seed, we can run php artisan db:seed

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'first_name' => 'Test',
            'last_name' => 'User',
            'email' => 'test@example.com',
        ]);

        $this->call(JobSeeder::class); //we can run other seeders from here too

    }
}

// We can make separate seeder files for separate tables too using the command php artisan make:seeder.
// Then we can run our seeders in isolation

// php artisan db:seed has a class option which by default is DatabaseSeeder, but to run only the JobSeeder using the php artisan db:seed we can do:
// php artisan db:seed --class=JobSeeder

// When do we run Factories and when do we run seeders:
// Factories are helpful to quickly scaffold data and prpare tests.
// Seeders are classes that can trigger those factories(one or more), not compulsorly though, it can run and seed data directly using Eloquent too.