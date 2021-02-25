<?php

namespace Database\Seeders;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Jetstream\CreateTeam;
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
        (new CreateNewUser)->create([
            'name' => 'Freek',
            'email' => 'freek@spatie.be',
            'password' => 'password',
            'password_confirmation' => 'password',
            'terms' => true,
        ]);
    }
}
