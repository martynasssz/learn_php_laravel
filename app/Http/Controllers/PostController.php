<?php

namespace App\Http\Controllers;

use App\BlogPost;
use Illuminate\Http\Request;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index', ['posts' => BlogPost::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */    
    public function show(Request $request, $id) //if we want to save more than one request
    {
        //$request->session()->reflash(); //this will keep the flash variable for next request(for one more request)
        return view('posts.show', ['post' => BlogPost::findOrFail($id)]); 


    }

    public function create()
    {
        return view ('posts.create'); // dot use in laravel replacemnet as directory separator (instead slash)
    }

    public function store(Request $request) //Request $request argument to store method
    {
       $validatedData = $request->validate([
        //'title' - field name we send through the form, and string that validation rules should be used for a title   
        'title' => 'required|max:100',   
        'content' => 'required'
       
           ]);

       $blogPost = new BlogPost(); //for storing to DB (new BlogPost model)
       $blogPost->title = $request->input('title'); //assign to $blogPost property title
       $blogPost->content = $request ->input('content'); //assign to $blogPost property content
       $blogPost->save(); //to save data to database

       $request->session()->flash('status', 'Blog post was created!');

       //return redirect('/posts'); //specify url where we want rederect

       //we can redirect to specific route
       //return redirect()->route('posts.index');

       //we can redirect to specific route with parameter
       return redirect()->route('posts.show', ['post'=>$blogPost->id]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */   
        
}
