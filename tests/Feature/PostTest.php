<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\BlogPost;

class PostTest extends TestCase
{
    use RefreshDatabase;
    
    public function testNoBlogPostsWhenNothingInDatabase()
    {
       
        $response = $this->get('/posts');
        $response->assertSeeText('No blog post yet!');
    }

    public function testSee1BlogPostWhenThereIs1()
    {
       //Arrange part
       $post = new BlogPost();
       $post->title = 'New title';
       $post->content = 'Content of the blog post';
       $post->save();

       //Act part
       $response = $this->get('/posts');
       
       //Asset part
       $response->assertSeeText('New title');
    
       // if text in specific table in DB
       $this->assertDatabaseHas('blog_posts', [
           'title' => 'New title'
       ]);
    }


}
