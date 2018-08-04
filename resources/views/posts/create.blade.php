@extends('main')

@section('title', '| Create New Post')

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
        <div class="col-md-8 offset-md-2">
            <h1>Create New Post</h1>
            <hr>
            <!-- Start Form -->
            {!! Form::open(['route' => 'posts.store', 'data-parsley-validate' => '', 'files' => 'true']) !!}
                {{ Form::label('title', 'Title:') }}
                {{ Form::text('title', null, array('class' => 'form-control', 'required' => '', 'maxlength' =>                                                                                                            '100')) }}
                {{ Form::label('slug', 'Slug:', ['class' => 'form-spacing-top']) }}
                {{ Form::text('slug', null, array('class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '255')) }}


                {{ Form::label('category_id', 'Category:', ['class' => 'form-spacing-top']) }}
                <select name="category_id" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach    
                </select>

                {{ Form::label('tags', 'Tags:', ['class' => 'form-spacing-top']) }}
                <select name="tags[]" class="form-control js-example-basic-multiple" multiple="multiple">
                    @foreach($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>

                    {{ Form::label('body', 'Post Body:', ['class' => 'form-spacing-top']) }}
                {{ Form::textarea('body', null, array('class' => 'form-control', 'required' => '')) }}

               {{ Form::submit('Create Post', array('class' => 'btn btn-success btn-lg btn-block', 'style' =>                                      'margin-top: 20px;')) }}

            {!! Form::close() !!}
            <!-- End Form -->
        </div>
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

