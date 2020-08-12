<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
        // DB::table('users')->insert([
        //         'name' => 'John Doe',
        //         'email' => 'john@laravel.test',
        //         'email_verified_at' => now(),
        //         'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        //         'remember_token' => Str::random(10),
        // ]);

        factory(App\User::class)->states('john-doe')->create(); //use john-doe factory state

        factory(App\User::class, 20)->create(); //20 users will be created
    }
}
