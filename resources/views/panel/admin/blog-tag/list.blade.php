@extends('panel.layout.main')

@push('style-section')
    <style>
        #alert-feature-message {
            position: fixed;
            top: 20px;
            z-index: 999;
            right: 10px;
            background: #04c104;
            color: white;
            padding: 10px;
            display: none;
        }

        .select2-container {
            width: 100% !important;
        }

        .product-counter {
            position: absolute;
            top: 92px;
        }
    </style>
@endpush

@section('title')
    Tags
@endsection

@section('page_title')
    Tags
@endsection

@section('body')
    {{--Start Content--}}
    <div class="section-wrapper">

        <form action="{{route('tag.store')}}" data-parsley-validate method="post">
            @csrf
           <div class="row">
               <div class="col-lg-11 col-md-11 col-sm-12 pd-b-20">
                   <input class="form-control" required
                          value="{{old('tag')}}" type="text"
                          id="tag" placeholder="Write Tag Name" name="tag">
                   @if($errors->has('tag'))
                       <div class="error"
                            style="color:red">{{$errors->first('tag')}}</div>
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
                           value="{{isset($_GET['tag'])?$_GET['tag']:""}}" type="text"
                           id="tag" placeholder="Search by tag" name="tag">
                    <small style="position: absolute; right:15px"><a href="{{route('tag.index')}}">Clear
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
            @if(count($tags) > 0)
                <table class="table table-striped">
                    <thead>
                    <th>Tag</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    @foreach($tags as $row)
                        <tr>
                            <td>{{$row->name}}</td>
                            <td>
                                <a href="{{route('tag.delete', $row->id)}}" class="btn btn-danger">
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
        if (isset($_GET['tag'])) {
            $arra['tag'] = trim($_GET['tag']);
        }
        ?>

        @include('panel.include.pagination',['paginator' => $tags->appends($arra)])
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
