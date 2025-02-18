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
                <a href="{{ route('posts.show', ['post' => $post->id]) }}" >{{ $post->title }} </a>
            </h3>

             @if($post->comments_count) {{-- if have any comments then--}}
                <p>{{ $post->comments_count }} comments</p>
             @else {{-- if zero display --}}
                <p>No comments yet!</p>
             @endif


            <a href="{{ route('posts.edit', ['post' => $post->id]) }}" class="btn btn-primary"> 
            Edit </a>
            
            <form method="POST" class="fm-inline"
                action="{{ route ('posts.destroy',['post' => $post->id]) }}"> {{-- specify parameter $post inside array and we should access to id which hae ben passed  --}}
                @csrf
                @method('DELETE')

                <input type="Submit" value="Delete!" class="btn btn-primary">
            </form>
        </p>
    @empty
        <p>No blog post yet!</p>   
    @endforelse



@endsection ('content')