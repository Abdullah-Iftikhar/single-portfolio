@extends('panel.layout.main')

@push('style-section')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <style>
        .select2-container {
            width: 100% !important;
        }

        .custom-cat {
            background-color: #1b84e7;
            color: white;
            padding: 2px 5px 2px 5px;
            margin-right: 5px;
            border-radius: 7px;
        }

        .custom-tag {
            background-color: #1b84e7;
            color: white;
            padding: 2px 5px 2px 5px;
            margin-right: 5px;
        }

        .additional-image-design {
            position: absolute;
            top: 0px;
            right: 0px;
        }

        .card-people-list img {
            width: 100% !important;
            border-radius: unset !important;
        }

        .card-people-list a {
            display: unset !important;
        }

    </style>
@endpush

@section('title')
    Vendor Detail
@endsection

@section('page_title')
    Product Detail
@endsection

@section('body')

    {{--Start Content--}}
    <div class="section-wrapper">
        <div class="mg-t-40">
            <div class="row row-sm">
                <div class="col-lg-8">

                    <div class="card card-people-list mg-b-20 ">
                        <h5>{{$product->title}}</h5>
                        @if($product->vendor_id)
                            <div class="pd-t-10 mg-t-5" style="display: flex">
                                <strong>Vendor:</strong>
                                <p class="mg-l-20">
                                    @if($product->getVendor->vendor_name)
                                        <a href="{{route('admin.vendor.detail', encrypt($product->getVendor->id))}}">{{$product->getVendor->vendor_name}}</a>
                                    @else
                                        ----------------
                                    @endif
                                </p>
                            </div>
                        @endif

                        @if(isset($product->getCategory) && $product->getCategory->count() > 0)
                            <div class="pd-t-10 mg-t-5" style="display: flex">
                                <strong>Categories:</strong> <br>
                                <div class="mg-l-20">
                                    @foreach($product->getCategory as $category)
                                        @if(isset($category->getProductCat))
                                            <span class="custom-cat">
                                                {{$category->getProductCat->category_title}}
                                        </span>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        @if(isset($product->getStore) && $product->getStore->count() > 0)
                            <div class="pd-t-10 mg-t-5" style="display: flex">
                                <strong>Stores:</strong> <br>
                                <div class="mg-l-20">
                                    @foreach($product->getStore as $store)
                                        @if(isset($store->getProductStore))
                                            <span class="custom-cat">
                                                {{$store->getProductStore->name}}
                                        </span>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        @if($product->tags)
                            <div class="pd-t-10 mg-t-5" style="display: flex">
                                <strong>Tags:</strong> <br>
                                @php
                                    $proTags = explode( ',' ,$product->tags);
                                @endphp

                                @if(count($proTags) > 0)
                                    <div class="mg-l-20">
                                        @foreach($proTags as $tag)
                                            <span class="custom-tag">
                                                {{$tag}}
                                            </span>

                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        @endif

                        @if($product->short_desc)
                            <div class="pd-t-10 taskDesc mg-t-5">
                                <strong>Short Description:</strong> <br>
                                <p>
                                    @if($product->short_desc)
                                        {!!$product->short_desc!!}
                                    @else
                                        ----------------
                                    @endif
                                </p>
                            </div>
                        @endif

                        @if($product->warranty)
                            <div class="pd-t-10 taskDesc mg-t-5">
                                <strong>Warranty:</strong> <br>
                                <p>
                                    @if($product->warranty)
                                        {!!$product->warranty!!}
                                    @else
                                        ----------------
                                    @endif
                                </p>
                            </div>
                        @endif

                        @if($product->long_desc)
                            <div class="pd-t-10 taskDesc mg-t-5">
                                <strong>Long Description:</strong> <br>
                                <p>
                                    @if($product->long_desc)
                                        {!!$product->long_desc!!}
                                    @else
                                        ----------------
                                    @endif
                                </p>
                            </div>
                        @endif

                    </div>
                    <!--
                    Price List Documents
                    -->

                    <div class="card card-people-list mg-t-20">
                        <div class="slim-card-title mg-b-5">
                            Additional Images
                            <a href="" data-toggle="modal" data-target="#add_img_model"
                               style="float:right;"><i class="fa fa-plus"></i></a>
                        </div>
                        @if($product->getImages->count() > 0)
                            <div class="row">
                                @foreach($product->getImages as $image)
                                    <div class="col-md-4 col-sm-6">
                                        @if($image->img_url == 1)
                                            <a target="_blank" style="display: unset"
                                               href="{{$image->img}}">
                                                <img src="{{$image->img}}" alt=""
                                                     style="margin-right:10px; width: 180px; height: 150px; border-radius: unset">
                                            </a>
                                        @else
                                            <a target="_blank" style="display: unset"
                                               href="{{asset('product_img/'.$image->img)}}">
                                                <img src="{{asset('product_img/'.$image->img)}}" alt=""
                                                     style="margin-right:10px; width: 180px; height: 150px; border-radius: unset">
                                            </a>
                                        @endif
                                        <a onclick="return confirm('Are you sure to delete?')"
                                           href="{{route('admin.delete.add.image', encrypt($image->id))}}"
                                           class="additional-image-design text-danger"><i class="fa fa-trash"></i></a>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="mg-t-20">No images added yet.</p>
                        @endif

                        {{--                        @if($blog-post->getImages->count() > 0)--}}
                        {{--                            <div>--}}
                        {{--                                @foreach($blog-post->getImages as $image)--}}
                        {{--                                    <a target="_blank" style="display: unset"--}}
                        {{--                                       href="{{asset('product_img/'.$image->img)}}">--}}
                        {{--                                        <img src="{{asset('product_img/'.$image->img)}}" alt=""--}}
                        {{--                                             style="margin-right:10px; width: 150px; height: 150px; border-radius: unset">--}}
                        {{--                                        --}}{{--                                            <a href="" class="additional-image-design"><i class="fa fa-trash"></i></a>--}}
                        {{--                                    </a>--}}
                        {{--                                @endforeach--}}
                        {{--                            </div>--}}
                        {{--                        @else--}}
                        {{--                            <p class="mg-t-20">No images added yet.</p>--}}
                        {{--                        @endif--}}
                    </div>

                    <div class="card card-people-list mg-t-20">
                        <div class="slim-card-title">
                            Special Price
                            <a href="" data-toggle="modal" data-target="#schedule_price"
                               style="float:right;"><i class="fa fa-plus"></i></a>
                        </div>
                        @if($product->getSchedulePrice->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <th>Price</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    {{--                                    <th>Status</th>--}}
                                    <th>Action</th>
                                    </thead>
                                    <tbody>
                                    @foreach($product->getSchedulePrice as $schePrice)
                                        <tr>
                                            <td>${{$schePrice->price}}</td>
                                            <td>{{$schePrice->start_date}}</td>
                                            <td>{{$schePrice->end_date}}</td>
                                            <td>
                                                <a onclick="return confirm('Are you sure?')"
                                                   href="{{route('admin.blog-post.sch.price.delete', encrypt($schePrice->id))}}"
                                                   title="Delete record"
                                                   class="mr-1"><i class="fa fa-trash text-danger"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p class="mg-t-20">No schedule price added yet.</p>
                        @endif
                    </div>

                    <div class="card card-people-list mg-t-20">
                        <div class="slim-card-title">
                            Notes
                            <a href="" data-toggle="modal" data-target="#notes_model"
                               style="float:right;"><i class="fa fa-plus"></i></a>
                        </div>
                        @if($product->getNotes->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <th>Note</th>
                                    <th>Created at</th>
                                    <th>Uploaded By</th>
                                    <th>Action</th>
                                    </thead>
                                    <tbody>
                                    @foreach($product->getNotes as $note)
                                        <tr>
                                            <td>{{$note->note}}</td>
                                            <td>{{$note->created_at->format('Y-m-d')}}</td>
                                            <td>
                                                @if(isset($note->getUploadBy))
                                                    <a href="{{route('admin.user.view', encrypt($note->getUploadBy->id))}}">{{$note->getUploadBy->fname}} {{$note->getUploadBy->lname}}</a>
                                                @else
                                                    not found
                                                @endif
                                            </td>
                                            <td>
                                                <a onclick="return confirm('Are you sure?')"
                                                   href="{{route('admin.blog-post.note.delete', encrypt($note->id))}}"
                                                   title="Delete record"
                                                   class="mr-1"><i class="fa fa-trash text-danger"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p class="mg-t-20">No Notes added yet.</p>
                        @endif
                    </div>

                    <div class="card card-people-list mg-t-20">
                        <div class="slim-card-title">
                            Attributes
                            <a onclick="getProductAttrView(null, '{{$product->id}}')"
                               style="float:right; cursor: pointer; color: #1b84e7"><i class="fa fa-plus"></i></a>
                        </div>
                        @if($product->getProductAttr->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <th>Name</th>
                                    <th>Value</th>
                                    <th>Action</th>
                                    </thead>
                                    <tbody>
                                    @foreach($product->getProductAttr as $attribute)
                                        <tr>
                                            <td>{{$attribute->getAttributeData->name}}</td>
                                            <td>{{$attribute->value}}</td>
                                            <td>
                                                <a title="Edit record" style="cursor: pointer" onclick="getProductAttrView('{{$attribute->id}}', '{{$product->id}}')"
                                                   class="mr-1"><i class="fa fa-edit text-info"></i></a>

                                                <a onclick="return confirm('Are you sure?')"
                                                   href="{{route('admin.blog-post.attribute.delete', encrypt($attribute->id))}}"
                                                   title="Delete record"><i class="fa fa-trash text-danger"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p class="mg-t-20">No attribute added yet.</p>
                        @endif
                    </div>
                </div>

                <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                    <div class="row row-sm">
                        <div class="col-lg-6">
                            <a href="{{route('admin.blog-post.edit', encrypt($product->id))}}"
                               class="btn btn-primary btn-sm btn-block mg-b-10">
                                <i class="icon ion-compose"></i>
                            </a>
                        </div>
                        <div class="col-lg-6">
                            <a onclick="return confirm('Are you sure?')"
                               href="{{route('admin.blog-post.delete', encrypt($product->id))}}"
                               class="btn btn-danger btn-sm btn-block mg-b-10"><i
                                    class="icon ion-android-delete"></i>
                            </a>
                        </div>
                        {{--                        <div class="col-lg-3">--}}
                        {{--                            <a href="{{route('admin.blog-post.clone', encrypt($blog-post->id))}}"--}}
                        {{--                               class="btn btn-success btn-sm btn-block mg-b-10">--}}
                        {{--                                Clone--}}
                        {{--                            </a>--}}
                        {{--                        </div>--}}
                        {{--                        <div class="col-lg-3">--}}
                        {{--                            <a href="{{route('admin.blog-post.sync', encrypt($blog-post->id))}}"--}}
                        {{--                               class="btn btn-pink btn-sm btn-block mg-b-10">--}}
                        {{--                                Sync--}}
                        {{--                            </a>--}}
                        {{--                        </div>--}}
                    </div>

                    <div class="row row-sm">
                        <div class="col-lg-6">
                            <a onclick="return confirm('Are you sure?')"
                               href="{{route('admin.sync.zaaz.to.pssav', encrypt($product->id))}}"
                               class="btn btn-primary btn-sm btn-block mg-b-10">
                                Sync Zaaz to Pssav
                            </a>
                        </div>

                        <div class="col-lg-6">
                            <a href="{{route('admin.sync.pssav.to.zaaz', encrypt($product->id))}}"
                               class="btn btn-primary btn-sm btn-block mg-b-10">
                                Sync Pssav to Zaaz
                            </a>
                        </div>

                    </div>

                    <div class="card card-people-list mg-b-20 pd-0 ">
                        <div class="card-contact mg-b-10" style="border:none;">
                            <p class="contact-item" style="border-top:0px;">
                                <span>Part No:</span>
                                {{$product->part_no ? $product->part_no:"-"}}
                            </p>

                            {{--                            <p class="contact-item">--}}
                            {{--                                <span>Retail Price:</span>--}}
                            {{--                                {{$blog-post->retail_price ? "$".$blog-post->retail_price:"-"}}--}}
                            {{--                            </p>--}}

                            <p class="contact-item">
                                <span>Cost:</span>
                                ${{$product->cost ? number_format($product->cost, 2):0}}
                            </p>

                            <p class="contact-item">
                                <span>MSRP:</span>
                                ${{$product->msrp ? number_format($product->msrp,2):0}}
                            </p>

                            <p class="contact-item">
                                <span>MAP:</span>
                                ${{$product->map_price ? number_format($product->map_price, 2):0}}
                            </p>

                            {{--                            <p class="contact-item">--}}
                            {{--                                <span>Sell Price:</span>--}}
                            {{--                                {{$blog-post->sell_price ? "$".$blog-post->sell_price:"-"}}--}}
                            {{--                            </p>--}}
                            <p class="contact-item">
                                <span>UPC:</span>
                                {{$product->upc ? $product->upc:"-"}}
                            </p>

                            <p class="contact-item">
                                <span>Product Condition</span>
                                {{$product->qua_status ? $product->qua_status:"-"}}
                            </p>

                            <p class="contact-item">
                                <span>PDF URL:</span>
                                <a href="{{$product->pdf_url ? $product->pdf_url:"#"}}">{{$product->pdf_url ? $product->pdf_url:"-"}}</a>
                            </p>

                            <p class="contact-item">
                                <span>Video URL:</span>
                                <a href="{{$product->video_url ? $product->video_url:"#"}}">{{$product->video_url ? $product->video_url:"-"}}</a>
                            </p>

                            <p class="contact-item">
                                <span>Shipping Weight (LB):</span>
                                {{$product->shipping_weight ? $product->shipping_weight:"-"}}
                            </p>

                            @if($product->shipping_width && $product->shipping_height && $product->shipping_length)
                                <p class="contact-item">
                                    <span>Shipping H*L*W (IN)</span>
                                    {{$product->shipping_height ? (float)$product->shipping_height:"-"}}
                                    * {{$product->shipping_length ? (float)$product->shipping_length:"-"}}
                                    * {{$product->shipping_width ? (float)$product->shipping_width:"-"}}
                                </p>
                            @endif

                            <p class="contact-item">
                                <span>Featured:</span>
                                @if($product->is_featured == 1)
                                    Yes
                                @else
                                    No
                                @endif
                            </p>

                            <p class="contact-item">
                                <span>Status:</span>
                                @if($product->status == 0)
                                    Trashed
                                @elseif($product->status == 1)
                                Active
                                @elseif($product->status == 2)
                                    Draft
                                @endif
                            </p>

                            <p class="contact-item">
                                <span>Stock Status: </span>
                                {{isset($product->stock_status)?$product->stock_status:"-"}}
                            </p>

                            <p class="contact-item">
                                <span>Stock Quantity: </span>
                                {{isset($product->stock_quantity)?$product->stock_quantity:"-"}}
                            </p>

                            <p class="contact-item">
                                <span>Created Date:</span>
                                {{$product->created_at->format('Y-m-d')}}
                            </p>

                            <p class="contact-item">
                                <span>Uploaded By:</span>
                                @if(isset($product->getUploadBy))
                                    <a href="{{route('admin.user.view', encrypt($product->getUploadBy->id))}}">{{$product->getUploadBy->fname}} {{$product->getUploadBy->lname}}</a>
                                @else
                                    not found
                                @endif
                            </p>

                            <p class="contact-item">
                                <span>Last Updated:</span>
                                {{$product->updated_at->format('Y-m-d')}}
                            </p>


                        </div>
                    </div>

                    @if($product->thumbnail)
                        @if($product->img_url == 1)
                            <div class="card mg-t-20">
                                <img src="{{$product->thumbnail}}"
                                     style="height:auto; width:100%;">
                            </div>
                        @else
                            <div class="card mg-t-20">
                                <img src="{{asset('pro_thumbnail/'.$product->thumbnail)}}"
                                     style="height:auto; width:100%;">
                            </div>
                        @endif
                    @endif

                    <div style="clear:both; height:0px;"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Schedule Price Model -->
    <div id="schedule_price" class="modal fade">
        <div class="modal-dialog modal-dialog-vertical-center" role="document">
            <div class="modal-content bd-0 tx-14">
                <div class="modal-header">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Schedual Price Detail</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form data-parsley-validate action="{{route('admin.blog-post.sch.price')}}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body pd-25">
                        <input type="hidden" value="{{$product->id}}" name="product">
                        <div class="row">
                            <div class="col-lg-12 pd-b-20">
                                <label class="form-control-label">Sale Price: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="number" step="any" required
                                       id="price" name="price">
                                @if($errors->has('price'))
                                    <div class="error"
                                         style="color:red">{{$errors->first('price')}}</div>
                                @endif
                            </div>

                            <div class="col-lg-12 pd-b-20">
                                <label class="form-control-label">Start Date: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="date" required
                                       id="start_date" name="start_date">
                                @if($errors->has('start_date'))
                                    <div class="error"
                                         style="color:red">{{$errors->first('start_date')}}</div>
                                @endif
                            </div>

                            <div class="col-lg-12 pd-b-20">
                                <label class="form-control-label">End Date: <span class="tx-danger">*</span></label>
                                <input type="date" class="form-control"
                                       required name="end_date">
                                @if($errors->has('end_date'))
                                    <div class="error"
                                         style="color:red">{{$errors->first('end_date')}}</div>
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
    {{--Schedule Price Model--}}

    <!-- Notes Model -->
    <div id="notes_model" class="modal fade">
        <div class="modal-dialog modal-dialog-vertical-center" role="document">
            <div class="modal-content bd-0 tx-14">
                <div class="modal-header">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add Notes</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form data-parsley-validate action="{{route('admin.blog-post.note')}}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body pd-25">
                        <input type="hidden" value="{{$product->id}}" name="product">
                        <div class="row">
                            <div class="col-lg-12 pd-b-20">
                                <label class="form-control-label">Note: <span class="tx-danger">*</span></label>
                                <textarea name="note" id="" required cols="60" rows="10"
                                          class="form-control"></textarea>
                                @if($errors->has('note'))
                                    <div class="error"
                                         style="color:red">{{$errors->first('note')}}</div>
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

    <!-- Additional Img Model -->
    <div id="add_img_model" class="modal fade">
        <div class="modal-dialog modal-dialog-vertical-center" role="document">
            <div class="modal-content bd-0 tx-14">
                <div class="modal-header">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add Images</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form data-parsley-validate action="{{route('admin.blog-post.add.image')}}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body pd-25">
                        <input type="hidden" value="{{$product->id}}" name="product_id">
                        <div class="row">
                            <div class="col-lg-12 pd-b-20" id="uploadImageField">
                                <label class="form-control-label">Select Multiple Images: <span
                                        class="tx-danger">*</span></label>
                                <input type="file" name="add_images[]" accept="image/*" multiple class="form-control">
                                @if($errors->has('add_images'))
                                    <div class="error"
                                         style="color:red">{{$errors->first('add_images')}}</div>
                                @endif
                            </div>

                            <div class="col-lg-12 pd-b-20">
                                <label class="ckbox">
                                    <input type="checkbox" @if(isset($user) && $user->all_vendor_access == 1) checked
                                           @endif id="imgUrlChecked" onchange="funImgUrlChecked()" name="all_vendors"
                                           value="yes"><span>Image URL</span>
                                </label>
                            </div>
                            <div class="col-lg-12 col-sm-12" id="imageURL" style="display: none">
                                <label class="form-control-label">Image URL(<strong class="text-info">comma
                                        seprated</strong>): <span class="tx-danger">*</span></label>
                                <textarea id="urlField" class="form-control" name="add_img_url" id="" cols="30"
                                          rows="10" disabled></textarea>
                                @if($errors->has('add_images'))
                                    <div class="error"
                                         style="color:red">{{$errors->first('add_images')}}</div>
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

    <!-- Attribute Model -->
    <div id="product_attribute" class="modal fade">
        <div class="modal-dialog modal-dialog-vertical-center" role="document">
            <div class="modal-content bd-0 tx-14" id="productAttrView">

            </div>
        </div><!-- modal-dialog -->
    </div><!-- modal -->
    {{--Attribute Model--}}
@endsection

@push('script-section')
    <script src="{{asset('temp-assets/lib/jquery.maskedinput/js/jquery.maskedinput.js')}}"></script>

    <script>

        $('#phoneMask').mask('(999) 999-9999');

        function funImgUrlChecked() {
            var val = $('#imgUrlChecked').is(':checked');
            if (val) {
                $('#imageURL').css('display', 'block')
                $('#uploadImageField').css('display', 'none')
                $('#urlField').removeAttr("disabled")
                // $('#imageURL').css('display', 'none')
            } else {
                $('#imageURL').css('display', 'none')
                $('#uploadImageField').css('display', 'block')
                $('#urlField').attr("disabled", "disabled")
            }
        }



    </script>
@endpush
