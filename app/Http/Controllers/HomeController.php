<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home() 
    {
        return view('home');
    }

    public function contact()
    {
        return view('contact');
    }

    public function blogPost($id, $welcome = 1)
    {
        $pages = [   //simple variable an asociative array
            1 => [   //key as id
                'title' => 'from page 1'
            ],
            2 => [   //key as id
                'title' => 'from page 2'
            ],
        ];
        $welcomes = [1 => 'Hello ', 2 => 'Welcome to ']; //optina paramenter
    
        return view('blog-post',
            ['data'=>$pages[$id], 
            'welcome' =>  $welcomes[$welcome],
        ]); //blog-post is function that will be rendered
    }
}
