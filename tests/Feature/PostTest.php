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

    public function testStoreValid()
    {
        $params = [
            'title' => 'Valid title',
            'content' => 'At least 10 characters'
        ]; 
        
        $this ->post('/posts', $params)
            ->assertStatus(302) //302 status, then redirection successful
            ->assertSessionHas('status'); //check if status variable inside in session

        $this->assertEquals(session('status'), 'Blog post was created!');  //reading session value using session function
            
    }

    public function testStoreFail()
    {
        $params = [
            'title' => 'x',
            'content' => 'x'
        ];

        $this->post('/posts', $params)
            ->assertStatus(302)
            ->assertSessionHas('errors');

        $messages = session('errors')->getMessages();

        $this->assertEquals($messages['title'][0], 'The title must be at least 5 characters.');
        $this->assertEquals($messages['content'][0], 'The content must be at least 10 characters.');

        //dd($messages->getMessages()); //dd to see that message contains   
    }
}
