@extends ('layout')

@section ('content')
    <form method="POST" 
          action="{{ route ('posts.update',['post' => $post->id]) }}"> {{-- specify parameter $post inside array and we should access to id which hae ben passed  --}}
        @csrf
        @method('PUT')
        
        @include('posts._form')

        <button type="submit">Update!</button> 


    </form>
@endsection

