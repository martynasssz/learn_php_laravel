<?php

use Illuminate\Database\Seeder;

class BlogPostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = App\User::all(); //take all user from users class
        factory(App\BlogPost::class, 50)->make()->each(function($post) use ($users) { //created 50 blogpost
            $post->user_id = $users->random()->id; //random users were asign to blog posts
            $post->save(); //save is needed because we use make() function
        });
    }
}
