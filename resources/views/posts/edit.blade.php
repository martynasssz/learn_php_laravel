@extends ('layout')

@section ('content')
    <form method="POST" 
          action="{{ route ('posts.update',['post' => $post->id]) }}"> {{-- specify parameter $post inside array and we should access to id which hae ben passed  --}}
        @csrf
        @method('PUT')
        <p>
            <label> Title</label>
            <input type="text" name="title" 
                value = "{{ old('title', $post->title) }}"/> {{-- $post->title keep atual post title--}}
        </p>
        <p>
            <label> Content</label>
            <input type="text" name="content" 
                value = "{{ old('content', $post->content) }}"/>
        </p>

        @if($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li> {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <button type="submit">Update!</button> 


    </form>
@endsection

