<?php

use Illuminate\Database\Seeder;
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

        if ($this->command->confirm('Do you want to refrech the database?')) {
            $this->command->call('migrate:refresh');
            $this->command->info('database was refreshed');
        }    

        $this->call([
            UsersTableSeeder::class,
            BlogPostsTableSeeder::class,
            CommentsTableSeeder::class
        ]); //call a specific class from which data will take
    }           
}