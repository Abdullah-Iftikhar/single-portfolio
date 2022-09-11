@extends('panel.layout.main')

@push('style-section')

@endpush

@section('title')
    Tag Images
@endsection

@section('page_title')
    Tags Images
@endsection

@section('body')
    {{--Start Content--}}
    <div class="section-wrapper">

        <form action="{{route('thumbnail.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 pd-b-20">
                    <input class="form-control"
                           value="{{old('title')}}" type="text"
                           id="title" placeholder="Write title" name="title">
                    @if($errors->has('title'))
                        <div class="error"
                             style="color:red">{{$errors->first('title')}}</div>
                    @endif
                </div>

                <div class="col-lg-5 col-md-5 col-sm-12 pd-b-20">
                    <input class="form-control" type="file" name="thumbnail">
                    @if($errors->has('thumbnail'))
                        <div class="error"
                             style="color:red">{{$errors->first('thumbnail')}}</div>
                    @endif
                </div>

                <div class="col-md-1 col-lg-1 col-sm-12">
                    <button type="submit" class="btn btn-primary active btn-block mg-b-10">
                        <i class="fa fa-plus"></i>
                    </button>
                </div>
            </div>
        </form>

        <form method="get" id="filterform" class="mt-2">
            <div class="row">
                <div class="col-lg-11 col-md-11 col-sm-12 pd-b-20">
                    <input class="form-control"
                           value="{{isset($_GET['title'])?$_GET['title']:""}}" type="text"
                           id="title" placeholder="Search by title" name="title">
                    <small style="position: absolute; right:15px"><a href="{{route('thumbnail.index')}}">Clear
                            Filter</a></small>
                </div>

                <div class="col-md-1 col-lg-1 col-sm-12">
                    <button id="filterformbtnsubmit" type="submit" class="btn btn-primary active btn-block mg-b-10"><i
                            class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </form>

        <div class="table-responsive">
            @if(count($thumbnails) > 0)
                <table class="table table-striped">
                    <thead>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    @foreach($thumbnails as $row)
                        <tr>
                            <td>{{$row->name}}</td>
                            <td>
                                <img src="{{$row->thumbnail_url}}" alt="img" width="30" height="30">
                            </td>
                            <td>
                                <a href="{{route('thumbnail.delete', $row->id)}}" class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                No Record Found.
            @endif
        </div>

        <?PHP
        $arra = array();
        if (isset($_GET['title'])) {
            $arra['title'] = trim($_GET['title']);
        }

        ?>

        @include('panel.include.pagination',['paginator' => $thumbnails->appends($arra)])
    </div>
    {{--End Content--}}

@endsection

@push('script-section')
    <script>
        {{--$(function () {--}}
        {{--    $(".ordering").click(function () {--}}
        {{--        var ordby = $(this).attr('ordby');--}}
        {{--        var field = $(this).attr('field');--}}
        {{--        if (ordby == '' || ordby == 'desc') {--}}
        {{--            ordby = 'asc';--}}
        {{--        } else if (ordby == 'asc') {--}}
        {{--            ordby = 'desc';--}}
        {{--        }--}}
        {{--        var status = '{{(isset($_GET["status"])?$_GET["status"]:"")}}';--}}
        {{--        var vendor_name = '{{(isset($_GET["vendor_name"])?$_GET["vendor_name"]:"")}}';--}}
        {{--        var part_no = '{{(isset($_GET["part_no"])?$_GET["part_no"]:"")}}';--}}
        {{--        var product_text = '{{(isset($_GET["pro_text"])?$_GET["pro_text"]:"")}}';--}}
        {{--        var product_condition = '{{(isset($_GET["product_condition"])?$_GET["product_condition"]:"")}}';--}}
        {{--        var category = '{{(isset($_GET["category"])?$_GET["category"]:"")}}';--}}
        {{--        location.href = '{{route("admin.blog-post.list")}}?status=' + status + '&vendor_name=' + vendor_name + '&part_no=' + part_no + '&product_condition=' + product_condition + '&product_text=' + product_text + '&category=' + category + '&' + field + "=" + ordby;--}}
        {{--    });--}}
        {{--});--}}

    </script>
@endpush
