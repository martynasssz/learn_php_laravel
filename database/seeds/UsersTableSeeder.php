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
        factory(App\User::class)->states('john-doe')->create(); //use john-doe factory state
        factory(App\User::class, 20)->create(); //20 users will be created      
    }
}
