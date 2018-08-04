@extends('main')

@section('content')
    @if(Auth::check())
    <div class="row">
        <div class="jumbotron">
            <h1 class="display-4">Welcome To My Blog !</h1>
            <p class="lead">Glad you came by.  I wanted to welcome you and let you know I appreciate you spending time here at the blog very much.  Everyone is so busy and life moves pretty fast,  so I really do appreciate you taking time out of your busy day to check out my blog!.   Thanks.</p>
            <hr class="my-4">
        </div>

    </div>

    <div class="row">
        <div class="col-md-8">

            @foreach($posts as $post)

                <div class="post">
                    <h3>{{ $post->title }}</h3>
                    <p>{{ substr(strip_tags($post->body), 0, 300) }}{{ strlen(strip_tags($post->body)) > 300 ? "..." : "" }}</p>
                    <a href="{{ url('blog/'.$post->slug) }}" class="btn btn-primary">Read More</a>
                </div>


                <hr>

            @endforeach

        </div>

        <div class="col-md-3 offset-md-1">
            <h2>Sidebar</h2>
        </div>
    </div>

    @else
        {!! redirect()->route('blog.index'); !!}
    @endif


@endsection
