@extends('panel.layout.main')

@push('style-section')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

    <style>
        .select2-container {
            width: 100% !important;
        }

        .bootstrap-tagsinput {
            display: block;
            width: 100%;
            padding: 0.594rem 0.75rem;
            font-size: 0.875rem;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: 3px;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }
    </style>
@endpush

@section('title')
    {{isset($post)?"Edit Product":"Add Product"}}
@endsection

@section('page_title')
    {{isset($post)?"Edit Product":"Add Product"}}
@endsection

@section('body')
    {{--Start Content--}}
    <div class="section-wrapper">
        <div class="mg-t-40">
            <form method="post" action="{{route('blog.store')}}" data-parsley-validate enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-md-12 pd-b-20">
                        <input required class="form-control" placeholder="Blog Title" maxlength="150"
                               value="{{isset($post)? $post->title:old('title')}}" type="text"
                               id="title" name="title">
                        @if($errors->has('title'))
                            <div class="error"
                                 style="color:red">{{$errors->first('title')}}</div>
                        @endif
                    </div>

                    <div class="col-lg-6 col-sm-6 col-md-12 pd-b-20">
                        <select name="tags[]" class="form-control select2"
                                data-placeholder="Choose Tags" required
                                multiple>
                            @foreach($tags as $tag)
                                <option value="{{$tag->id}}">{{$tag->name}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('tags'))
                            <div class="error"
                                 style="color:red">{{$errors->first('tags')}}</div>
                        @endif
                    </div>

                    <div class="col-lg-6 col-sm-6 col-md-12 pd-b-20">
                        <select name="thumbnail" class="form-control" required>
                            <option selected disabled>Choose Thumbnail</option>
                            @foreach($thumbnails as $thumbnail)
                                <option value="{{$thumbnail->id}}">{{$thumbnail->name}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('thumbnail'))
                            <div class="error"
                                 style="color:red">{{$errors->first('thumbnail')}}</div>
                        @endif
                    </div>

                    <div class="col-lg-12 col-sm-12 col-md-12 pd-b-20">
                        <textarea id="blog_detail" required class="form-control" placeholder=""
                                  name="post">{{isset($post)?$post->post:old('post')}}</textarea>
                        @if($errors->has('post'))
                            <div class="error"
                                 style="color:red">{{$errors->first('post')}}</div>
                        @endif
                    </div>
                </div>

                <div class="form-layout-footer">
                    <button type="submit" class="btn btn-primary bd-0"><i class="fa fa-save mr-1"></i>Post</button>
                </div>
            </form>
        </div>
    </div>
    {{--End Content--}}
@endsection

@push('script-section')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <script>
        'use strict';
        $('.select2').select2({
            minimumResultsForSearch: Infinity
        });

        $('#blog_detail').summernote();
    </script>
@endpush
