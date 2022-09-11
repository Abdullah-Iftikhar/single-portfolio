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
    Product List
@endsection

@section('page_title')
    Product List
@endsection

@section('body')

    {{--Start Content--}}
    <div class="section-wrapper">
        {{--        <div class="blog-post-counter">--}}
        {{--            <small> Products = <strong class="text-info">{{$products->total()}}</strong></small>--}}
        {{--        </div>--}}
        <div id="alert-feature-message"></div>

        <div class="row mg-b-2">
            <div class="col-lg-3 col-md-3"></div>
            <div class="col-sm-3 col-lg-3 col-md-6">
{{--                <a onclick="confirm('Are your sure?')" href="{{route('admin.pssav.to.zaaz')}}" id="filterformbtnsubmit"--}}
{{--                   type="submit" class="btn btn-primary active btn-block mg-b-10">--}}
{{--                    Sync Pssav to Zaaz--}}
{{--                </a>--}}
            </div>

            <div class="col-sm-3 col-lg-3 col-md-6">
{{--                <a onclick="confirm('Are your sure?')" href="{{route('admin.zaaz.to.pssav')}}" id="filterformbtnsubmit"--}}
{{--                   type="submit" class="btn btn-primary active btn-block mg-b-10">--}}
{{--                    Sync Zaaz to Pssav--}}
{{--                </a>--}}
{{--                <a href="{{route('admin.backorder.products.csv')}}" class="btn btn-primary active btn-block mg-b-10">--}}
{{--                    <i class="fa fa-download mr-1"></i> Backorders Products--}}
{{--                </a>--}}
            </div>

            <div class="col-md-1 col-lg-1 col-sm-12">
                <a href="" class="btn btn-primary active btn-block mg-b-10">
                    <i class="fa fa-plus"></i>
                </a>
            </div>

            <div class="col-md-1 col-lg-1 col-sm-12">
                <a title="Upload CSV file" href="{{route('admin.blog-post.import.csv')}}"
                   class="btn btn-primary active btn-block mg-b-10"><i class="fa fa-upload"></i></a>
            </div>
        </div>

        <form method="get" id="filterform" style="margin-top: 20px">
            <div class="row">
                <div class="col-lg-3 col-sm-12 pd-b-20">
                    <input class="form-control"
                           value="{{isset($_GET['pro_text'])?$_GET['pro_text']:""}}" type="text"
                           id="pro_text" placeholder="Search by text" name="pro_text">
                    @if($errors->has('pro_text'))
                        <div class="error"
                             style="color:red">{{$errors->first('pro_text')}}</div>
                    @endif
                </div>

                <div class="col-lg-3 col-sm-12 pd-b-20">
                    <input class="form-control"
                           value="{{isset($_GET['part_no'])?$_GET['part_no']:""}}" type="text"
                           id="part_no" placeholder="Search by part number" name="part_no">
                    @if($errors->has('part_no'))
                        <div class="error"
                             style="color:red">{{$errors->first('part_no')}}</div>
                    @endif
                </div>

                <div class="col-md-1 col-lg-1 col-sm-12">
                    <button id="filterformbtnsubmit" type="submit" class="btn btn-primary active btn-block mg-b-10"><i
                            class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </form>

        <div class="table-responsive">
            @if(count($products) > 0)
                <table class="table table-striped">
                    <thead>
                    <th>Thumbnail</th>
                    <th>Brand Name</th>
                    <th style="cursor:pointer;" class="ordering {{$order_part_no}}" field="order_part_no"
                        ordby="{{$order_part_no}}">Part #
                    </th>
                    <th style="cursor:pointer;" class="ordering {{$order_cost}}" field="order_cost"
                        ordby="{{$order_cost}}">Cost
                    </th>
                    <th style="cursor:pointer;" class="ordering {{$order_msrp}}" field="order_msrp"
                        ordby="{{$order_msrp}}">MSRP
                    </th>
                    <th style="cursor:pointer;" class="ordering {{$order_map}}" field="order_map"
                        ordby="{{$order_map}}">MAP
                    </th>
                    <th style="cursor:pointer;" class="ordering {{$order_margin}}" field="order_margin"
                        ordby="{{$order_margin}}">Margin
                    </th>
                    <th style="cursor:pointer; text-align: center" class="ordering {{$order_featured}}"
                        field="order_featured" ordby="{{$order_featured}}">Featured
                    </th>
                    <th style="cursor:pointer; text-align: center" class="ordering {{$order_status}}"
                        field="order_status" ordby="{{$order_status}}">Status
                    </th>
                    <th style="cursor:pointer;" class="ordering {{$order_stock}}" field="order_stock"
                        ordby="{{$order_stock}}">Out Of Stock
                    </th>
                    <th style="cursor:pointer;" class="ordering {{$order_last_udpate}}" field="order_last_udpate"
                        ordby="{{$order_last_udpate}}">Last Update
                    </th>
                    </thead>
                    <tbody>
                    @foreach($products as $row)
                        <tr>
                            <td>
                                @if($row->img_url == 1)
                                    <a href="{{route('admin.blog-post.detail', encrypt($row->id))}}">
                                        <img style="border-radius: 10px;"
                                             src="{{$row->thumbnail}}" alt="" width="20"
                                             height="20">
                                    </a>
                                @else
                                    <a href="{{route('admin.blog-post.detail', encrypt($row->id))}}">
                                        <img style="border-radius: 10px;"
                                             src="{{asset('pro_thumbnail/'.$row->thumbnail)}}" alt="" width="20"
                                             height="20">
                                    </a>
                                @endif
                            </td>
                            <td>
                                @if(isset($row->getVendor))
                                    {{--                                    <a href="{{route('admin.vendor.detail', encrypt($row->getVendor->id))}}">{{$row->getVendor->vendor_name}}</a>--}}
                                    {{$row->getVendor->vendor_name}}
                                @else
                                    not found
                                @endif
                            </td>
                            <td><a href="{{route('admin.blog-post.edit', encrypt($row->id))}}"
                                   title="Edit Product">{{$row->part_no}}</a></td>
                            <td>
                                ${{number_format($row->cost,2)}}
                                <small style="cursor: pointer; color: #1b84e7"
                                       onclick="insPriceChange('{{$row->id}}', '{{$row->cost}}', 'cost')"><i
                                        class="fa fa-edit"></i></small>
                            </td>
                            <td>
                                ${{number_format($row->msrp,2)}}
                                <small style="cursor: pointer; color: #1b84e7"
                                       onclick="insPriceChange('{{$row->id}}', '{{$row->msrp}}', 'msrp')"><i
                                        class="fa fa-edit"></i></small>
                            </td>
                            <td>
                                ${{number_format($row->map_price,2)}}
                                <small style="cursor: pointer; color: #1b84e7"
                                       onclick="insPriceChange('{{$row->id}}', '{{$row->map_price}}', 'map')"><i
                                        class="fa fa-edit"></i></small>
                            </td>
                            <td>
                                {{round($row->productMargin, 2)}}%
                            </td>
                            <td class="text-center">
                                <div style="cursor: pointer" onclick="isFeatured('{{$row->id}}')">
                                    <i id="successCircle{{$row->id}}"
                                       class="fa fa-circle @if($row->is_featured == 1) text-success  @else text-dark @endif"></i>
                                </div>
                            </td>
                            <td class="text-center">
                                {{--                                <div style="cursor: pointer" onclick="isStatus('{{$row->id}}')">--}}
                                {{--                                    <i id="statusCircle{{$row->id}}"--}}
                                {{--                                       class="fa fa-circle @if($row->status == 1) text-success  @else text-dark @endif"></i>--}}
                                {{--                                </div>--}}
                                @if($row->status == 1)
                                <i class="fa fa-circle text-success" title="Active"></i>
                                    <small style="cursor: pointer; color: #1b84e7"
                                           onclick="isStatusChange('{{$row->id}}')"><i
                                            class="fa fa-edit"></i></small>
                                @elseif($row->status == 2)
                                    <i class="fa fa-circle text-dark" title="Draft"></i>
                                    <small style="cursor: pointer; color: #1b84e7"
                                           onclick="isStatusChange('{{$row->id}}')"><i
                                            class="fa fa-edit"></i></small>
                                @else
                                    <i class="fa fa-circle text-danger" title="Trashed"></i>
                                    <small style="cursor: pointer; color: #1b84e7"
                                           onclick="isStatusChange('{{$row->id}}')"><i
                                            class="fa fa-edit"></i></small>
                                @endif
                            </td>

                            <td>
                                <input onclick="productOutOfStock('{{$row->id}}')" type="checkbox" title="click to mark out of stock."
                                       class="form-control" style="cursor: pointer; margin-left: -13px"
                                       @if($row->stock_status == "outofstock") checked @endif>
                            </td>
                            <td>{{$row->updated_at->format('Y-m-d')}}</td>
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
        if (isset($_GET['vendor_name'])) {
            $arra['vendor_name'] = trim($_GET['vendor_name']);
        }
        if (isset($_GET['part_no'])) {
            $arra['part_no'] = trim($_GET['part_no']);
        }
        ?>

        @include('panel.include.pagination',['paginator' => $products->appends($arra)])
    </div>
    {{--End Content--}}

    <!-- Price Model -->
    <div id="price_model" class="modal fade">
        <div class="modal-dialog modal-dialog-vertical-center" role="document">
            <div class="modal-content bd-0 tx-14">
                <div class="modal-header">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Update Price</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form data-parsley-validate action="{{route('admin.blog-post.price.update')}}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body pd-25">
                        <input type="hidden" name="product_id" id="productId">
                        <input type="hidden" name="price_type" id="priceType">
                        <div class="row">
                            <div class="col-lg-12 pd-b-20" id="upload_file_field">
                                <label class="form-control-label">Price: <span class="tx-danger">*</span></label>
                                <input required class="form-control" type="number" step="any" name="product_price"
                                       id="productPrice">
                                @if($errors->has('product_price'))
                                    <div class="error"
                                         style="color:red">{{$errors->first('product_price')}}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div><!-- modal-dialog -->
    </div><!-- modal -->
    {{--Price Model--}}

    <!-- Notes Model -->
    <div id="status_modal" class="modal fade">
        <div class="modal-dialog modal-dialog-vertical-center" role="document">
            <div class="modal-content bd-0 tx-14">
                <div class="modal-header">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Update Status</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form data-parsley-validate action="{{route('admin.blog-post.status')}}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body pd-25">
                        <input type="hidden" name="product_id" id="statusProductId">
                        <div class="row">
                            <div class="col-lg-12 pd-b-20" id="upload_file_field">
                                <label class="form-control-label">Status: <span class="tx-danger">*</span></label>
                                <select name="status" id="" class="form-control" required>
                                    <option selected disabled>Choose One</option>
                                    <option value="1">Publish</option>
                                    <option value="2">Draft</option>
                                    <option value="0">Trash</option>
{{--                                    publish, trash, draft--}}
                                </select>

                                @if($errors->has('status'))
                                    <div class="error"
                                         style="color:red">{{$errors->first('status')}}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div><!-- modal-dialog -->
    </div><!-- modal -->
    {{--Notes Model--}}
@endsection

@push('script-section')
    <script>
        $(function () {
            $(".ordering").click(function () {
                var ordby = $(this).attr('ordby');
                var field = $(this).attr('field');
                if (ordby == '' || ordby == 'desc') {
                    ordby = 'asc';
                } else if (ordby == 'asc') {
                    ordby = 'desc';
                }
                var status = '{{(isset($_GET["status"])?$_GET["status"]:"")}}';
                var vendor_name = '{{(isset($_GET["vendor_name"])?$_GET["vendor_name"]:"")}}';
                var part_no = '{{(isset($_GET["part_no"])?$_GET["part_no"]:"")}}';
                var product_text = '{{(isset($_GET["pro_text"])?$_GET["pro_text"]:"")}}';
                var product_condition = '{{(isset($_GET["product_condition"])?$_GET["product_condition"]:"")}}';
                var category = '{{(isset($_GET["category"])?$_GET["category"]:"")}}';
                location.href = '{{route("admin.blog-post.list")}}?status=' + status + '&vendor_name=' + vendor_name + '&part_no=' + part_no + '&product_condition=' + product_condition + '&product_text=' + product_text + '&category=' + category + '&' + field + "=" + ordby;
            });
        });

    </script>
@endpush
