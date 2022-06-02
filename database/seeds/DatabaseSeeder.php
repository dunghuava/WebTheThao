<?php

use App\User;
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
        User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt(12345678),
            'type' => 0
        ]);

        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt(12345678),
            'type' => 1
        ]);
    }
}
