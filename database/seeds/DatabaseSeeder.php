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

        $doe = factory(App\User::class)->states('john-doe')->create(); //use john-doe factory state
        $else = factory(App\User::class, 20)->create(); //20 users will be created

        $users = $else->concat([$doe]);  
        
        $posts = factory(App\BlogPost::class, 50)->make()->each(function($post) use ($users) { //created 50 blogpost
            $post->user_id = $users->random()->id; //random users were asign to blog posts
            $post->save(); //save is needed because we use make() function
        });

        $comments = factory(App\Comment::class, 150)->make()->each(function($comment) use ($posts) {
            $comment->blog_post_id = $posts->random()->id;
            $comment->save();
        });        
    }
}