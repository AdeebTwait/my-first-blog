@extends('main')

@section('title', '| View Post')

@section('stylesheets')
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>{{ $post->title }}</h1>
            <p class="lead">{!! $post->body  !!}</p>

            <hr>

            <div class="tags">
                @foreach($post->tags as $tag)
                    <span class="badge badge-secondary">{{ $tag->name }}</span>
                @endforeach
            </div>

            <div id="backend-comments" style="margin-top: 50px;">
                <h3>Comments <small>{{ $post->comments()->count() }} Total</small></h3>

                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Comment</th>
                            <th  width="70px"></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($post->comments as $comment)
                         <tr>
                             <td>{{ $comment->name }}</td>
                             <td>{{ $comment->email }}</td>
                             <td>{{ $comment->comment }}</td>
                             <td>
                                 <a class="btn btn-danger btn-xs" href="{{ route('comment.delete', $comment->id) }}"><span class="fa fa-trash"></span></a>
                             </td>
                         </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>


        <div class="col-md-4">
            <div class="card card-body bg-light">

                <dl class="dl-horizontal">
                    <dt>Category:</dt>
                    <dd>{{ $post->category->name }}</dd>
                </dl>

                <dl class="dl-horizontal">
                <dt>Create At:</dt>
                    <dd>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</dd>
                </dl>

                <dl class="dl-horizontal">
                    <dt>Last Updated:</dt>
                    <dd>{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</dd>
                </dl>

                <hr>

                <div class="row">
                    <div class="col-sm-6">
                        {!! Html::LinkRoute('posts.edit', 'Edit', array($post->id), array('class' => 'btn btn-primary btn-block')) !!}
                    </div>

                    <div class="col-sm-6">
                        {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE', 'class' => 'delete'])  !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        {{ Html::LinkRoute('posts.index', '<< See All Posts', array(), ['class' => 'btn btn-outline-secondary                                                                                                          btn-block btn-h1-spacing']) }}
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $(".delete").on("submit", function(){
            return confirm("Are you sure?");
        });
    </script>
@endsection
