<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        User::create([
        'level' => 'user',
        'name' => 'bobon',
        'email' => 'bobon@gmail.com',
        'password' => bcrypt('password')
        ]);

        User::create([
        'level' => 'admin',
        'name' => 'admin',
        'email' => 'admin@gmail.com',
        'password' => bcrypt('admin')
        ]);
    }
    

}
