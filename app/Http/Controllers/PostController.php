<?php

namespace App\Http\Controllers;

use App\BlogPost;
use Illuminate\Http\Request;
use App\Http\Requests\StorePost;




class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       /*fetch all blogposts*/ 
       /* return view('posts.index', ['posts' => BlogPost::all()]);*/

      /*show new property of counting commnets*/
       return view(
           'posts.index',
            ['posts' => BlogPost::withCount('comments')->get()]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */    
    public function show($id) 
    {        
        return view('posts.show', ['post' => BlogPost::findOrFail($id)]); 
    }

    public function create()
    {
        return view ('posts.create'); // dot use in laravel replacemnet as directory separator (instead slash)
    }

    public function store(StorePost $request) //StorePost because created StorePost method
    {
       $validatedData = $request->validated(); //changed to valideted() because use StorePost request
       $blogPost = BlogPost::create($validatedData);  //using static method instead new BlogPost, everything is done in created method
       $request->session()->flash('status', 'Blog post was created!');

       return redirect()->route('posts.show', ['post'=>$blogPost->id]);

    }

    public function edit($id)
    {
        $post = BlogPost::findOrFail($id);
        return view('posts.edit', ['post' => $post]);
    }

    public function update(StorePost $request, $id)
    {
        $post = BlogPost::findOrFail($id); //read data from DB
        $validatedData = $request->validated();

        $post ->fill($validatedData); //fill() method is using when we have data in db
        $post->save();

        $request->session()->flash('status', 'Blog post was updated!');

        return redirect()->route('posts.show', ['post'=>$post->id]);
    }

    public function destroy(Request $request, $id) {
        $post = BlogPost::findOrFail($id); //read data from DB
        $post ->delete();

        //BlogPost::destroy($id);  the same upper

      
         $request->session()->flash('status', 'Blog post was deleted!');
        return redirect()->route('posts.index');

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */   
        
}
