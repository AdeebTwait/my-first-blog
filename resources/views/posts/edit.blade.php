@extends('main')

@section('title', '| Edit Blog Post')

@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
    {!! Html::style('css/select2.min.css') !!}

    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>

    <script>
        tinymce.init({
            selector: 'textarea'
        });
    </script>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8">
        {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT']) !!}
            {{ Form::label('title', "Title:") }}
            {{ Form::text('title', null, ["class" => 'form-control form-control-lg']) }}

            {{ Form::label('slug', "Slug:", ['class' => 'form-spacing-top']) }}
            {{ Form::text('slug', null, ["class" => 'form-control']) }}

            {{ Form::label('category_id', "Category:", ['class' => 'form-spacing-top']) }}
            {{ Form::select('category_id', $categories, null, ["class" => 'form-control']) }}

            {{ Form::label('tags', "Tags:", ['class' => 'form-spacing-top']) }}
            {{ Form::select('tags[]', $tags, null, ["class" => 'form-control js-example-basic-multiple', 'multiple' => 'multiple']) }}

            {{ Form::label('body', "Body:", ['class' => 'form-spacing-top']) }}
            {{ Form::textarea('body', null, ["class" => 'form-control']) }}
        </div>

        <div class="col-md-4">
            <div class="card card-body bg-light">
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
                        {!! Html::LinkRoute('posts.show', 'Cancel', array($post->id), array('class' => 'btn btn-danger btn-block')) !!}
                    </div>
                    <div class="col-sm-6">
                        {{ Form::submit('Save', ['class' => 'btn btn-success btn-block']) }}
                    </div>
                </div>

            </div>
        </div>
        {!! Form::close() !!}
    </div>

@endsection

@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
    {!! Html::script('js/select2.min.js') !!}

    <script type="text/javascript">
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>
@endsection
