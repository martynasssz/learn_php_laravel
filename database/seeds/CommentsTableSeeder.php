<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $posts = App\BlogPost::all();

        if ($posts->count() === 0) { //if no blogpost not asking about comments
            $this->command->info('There are no blog posts, so no comments will be added' );
            return;
        }

        $commentsCount = (int)$this->command->ask('How many comments would you like?', 150);
        
        factory(App\Comment::class, $commentsCount)->make()->each(function($comment) use ($posts) {
            $comment->blog_post_id = $posts->random()->id;
            $comment->save();
        });        
    }
    
}
