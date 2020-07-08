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
    public function show($id)
    {
       return view('posts.show', ['post' => BlogPost::findOrFail($id)]); 
    }

    public function create()
    {
        return view ('posts.create'); // dot use in laravel replacemnet as directory separator (instead slash)
    }

    public function store(Request $request) //Request $request argument to store method
    {
       // dd($request->all());    // use all method to fetch all input values
       // echo individual values

       $title = $request->input('title');
       $content = $request ->input('content');

       dd($title, $content);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */   
        
}
