<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usersCount = max((int)$this->command->ask('How many users would you like?', 20),1); //at least should be created one user

        factory(App\User::class)->states('john-doe')->create(); //use john-doe factory state
        factory(App\User::class, $usersCount)->create(); //20 users will be created      
    }
}
