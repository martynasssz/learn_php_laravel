@extends('layout')

@section('content')   
    {{-- @foreach ($posts as $post)
        <p>
            <h3> {{ $post->title }}</h3>
        </p>
    @endforeach 
    ----------instead foreach we can write forelse---------------------
    --}} 

    @forelse ($posts as $post)
        <p>
            <h3> 
                <a href="{{ route('posts.show', ['post' => $post->id]) }}"> {{ $post->title }} </a>
            </h3>

            <a href="{{ route('posts.edit', ['post' => $post->id]) }}"> {{ $post->title }}
            Edit </a>

        </p>
    @empty
        <p>No blog post yet!</p>   
    @endforelse



@endsection ('content')