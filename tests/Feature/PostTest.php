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

    // public function testSee1BlogPostWhenThereIs1()
    // {
    //    //Arrange part
    //    $post = $this->createDummyBlogPost();

    //    //Act part
    //    $response = $this->get('/posts');
              
    //    //Asset part
    //    $response->assertSeeText('New title');
    //    $response->assertSeeText('No comments yet!');
    
    //    // if text in specific table in DB
    //    $this->assertDatabaseHas('blog_posts', [
    //        'title' => 'New title'
    //    ]);
    // }

    // public function testStoreValid()
    // {
    //     $params = [
    //         'title' => 'Valid title',
    //         'content' => 'At least 10 characters'
    //     ]; 
        
    //     $this ->post('/posts', $params)
    //         ->assertStatus(302) //302 status, then redirection successful
    //         ->assertSessionHas('status'); //check if status variable inside in session

    //     $this->assertEquals(session('status'), 'Blog post was created!');  //reading session value using session function
            
    // }

    // public function testStoreFail()
    // {
    //     $params = [
    //         'title' => 'x',
    //         'content' => 'x'
    //     ];

    //     $this->post('/posts', $params)
    //         ->assertStatus(302)
    //         ->assertSessionHas('errors');

    //     $messages = session('errors')->getMessages();

    //     $this->assertEquals($messages['title'][0], 'The title must be at least 5 characters.');
    //     $this->assertEquals($messages['content'][0], 'The content must be at least 10 characters.');

    //     //dd($messages->getMessages()); //dd to see that message contains   
    // }

    // public function testUpdateValid()
    // {
    //     $post = $this->createDummyBlogPost();

    //     $this->assertDatabaseHas('blog_posts', $post->toArray()); //$post->toArray()) exists in database        
    //     $params = [
    //         'title' => 'A new named title',
    //         'content' => 'Content was changed'
    //     ];

    //     $this->put("/posts/{$post->id}", $params)
    //         ->assertStatus(302)
    //         ->assertSessionHas('status');
        
    //     $this->assertEquals(session('status'), 'Blog post was updated!');//veryfy content of status method
    //     $this->assertDatabaseMissing('blog_posts', $post->toArray());
    //     $this->assertDatabaseHas('blog_posts', [
    //         'title' => 'A new named title'
    //     ]);
    // }

    // public function testDelete()
    // {
    //     $post = $this->createDummyBlogPost();
    //     $this->assertDatabaseHas('blog_posts', $post->toArray());

    //     $this->delete("/posts/{$post->id}")
    //         ->assertStatus(302)
    //         ->assertSessionHas('status');
        
    //     $this->assertEquals(session('status'), 'Blog post was deleted!');
    //     $this->assertDatabaseMissing('blog_posts', $post->toArray());
    // }

    // private function createDummyBlogPost(): BlogPost
    // {
    //     $post = new BlogPost();
    //     $post->title = 'New title';
    //     $post->content = 'Content of the blog post';
    //     $post->save();

    //     return $post;
    // }

}
