@extends('panel.layout.main')

@push('style-section')
    <link href="{{asset('temp-assets/lib/bootstrap-tagsinput/css/bootstrap-tagsinput.css')}}" rel="stylesheet">
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
    {{isset($product)?"Edit Product":"Add Product"}}
@endsection

@section('page_title')
    {{isset($product)?"Edit Product":"Add Product"}}
@endsection

@section('body')
    {{--Start Content--}}
    <div class="section-wrapper">
        <div class="mg-t-40">
            @if(isset($product) && isset($product->slug) && $product->slug !="")
                <div class="row">
                <div class="col-md-11 col-lg-11"></div>
                <div class="col-md-1 col-lg-1">
                    <a target="_blank" href="https://pssav.com/product/{{$product->slug}}" class="btn btn-primary active btn-block mg-b-10">
                        <i class="fa fa-eye"></i>
                    </a>
                </div>
            </div>
            @endif
            <form method="post" data-parsley-validate
                  @if(isset($clone))
                  action="{{route('admin.blog-post.post.data', $clone)}}"
                  @else
                  action="{{isset($product)? route('admin.blog-post.update.data', encrypt($product->id)):route('admin.blog-post.post.data')}}"
                  @endif
                  enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-md-12 pd-b-20">
                        <label class="form-control-label">Category:</label>
                        <select name="cat_title[]" class="form-control select2"
                                data-placeholder="Choose Categories"
                                multiple>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}"
                                        @if(isset($product) && in_array($category->id,$product->getCategoriesId()->toArray())) selected
                                        @elseif(old('cat_title') !== null && in_array($category->id, old('cat_title'))) selected @endif>{{$category->category_title}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('cat_title'))
                            <div class="error"
                                 style="color:red">{{$errors->first('cat_title')}}</div>
                        @endif
                    </div>

                    <div class="col-lg-12 col-sm-12 col-md-12 pd-b-20">
                        <label class="form-control-label">Brand: <span class="tx-danger">*</span></label>
                        <select required name="vendor" id="" class="form-control select2-show-search"
                                data-placeholder="Choose one">
                            @if(!isset($product))
                                <option label="Choose one"></option>
                            @endif
                            @foreach($vendors as $vendor)
                                <option value="{{$vendor->id}}"
                                        @if(isset($product) && $product->vendor_id == $vendor->id) selected @else {{old('vendor') == $vendor->id? 'selected' : ""}} @endif>{{$vendor->vendor_name}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('vendor'))
                            <div class="error"
                                 style="color:red">{{$errors->first('vendor')}}</div>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-8 pd-b-20">
                        <label class="form-control-label">Title <span class="tx-danger">*</span>:</label>
                        <input required class="form-control"
                               value="{{isset($product)? $product->title:old('title')}}" type="text"
                               id="title" name="title">
                        @if($errors->has('title'))
                            <div class="error"
                                 style="color:red">{{$errors->first('title')}}</div>
                        @endif
                    </div>
                    <div class="col-lg-4 pd-b-20">
                        <label class="form-control-label">Thumbnail <span class="tx-danger">*</span>:</label>
                        <input @if(!isset($product)) required @endif class="form-control" type="file" accept="image/*"
                               id="thumbnail" name="thumbnail">
                        @if($errors->has('thumbnail'))
                            <div class="error"
                                 style="color:red">{{$errors->first('thumbnail')}}</div>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-md-12 pd-b-20">
                        <label class="form-control-label">Store:</label>
                        <select name="stores[]" class="form-control select2"
                                data-placeholder="Choose Store"
                                multiple>
                            @foreach($stores as $store)
                                <option value="{{$store->id}}"
                                        @if(isset($product) && in_array($store->id,$product->getStoreId()->toArray())) selected
                                        @elseif(old('stores') !== null && in_array($store->id, old('stores'))) selected @endif>{{$store->name}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('stores'))
                            <div class="error"
                                 style="color:red">{{$errors->first('stores')}}</div>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 pd-b-20">
                        <label class="form-control-label">Part No <span class="tx-danger">*</span>:</label>
                        <input class="form-control" required
                               value="{{isset($product)? $product->part_no:old('part_no')}}" type="text"
                               id="part_no" name="part_no" step="any">
                        @if($errors->has('part_no'))
                            <div class="error"
                                 style="color:red">{{$errors->first('part_no')}}</div>
                        @endif
                    </div>

                    <div class="col-lg-6 pd-b-20">
                        <label class="form-control-label">UPC:</label>
                        <input class="form-control"
                               value="{{isset($product)? $product->upc:old('upc')}}" type="text"
                               id="upc" name="upc">
                        @if($errors->has('upc'))
                            <div class="error"
                                 style="color:red">{{$errors->first('upc')}}</div>
                        @endif
                    </div>

                    <div class="col-lg-4 col-sm-12 pd-b-20">
                        <label class="form-control-label">Cost <span class="tx-danger">*</span>:</label>
                        <input class="form-control" step="any" required
                               value="{{isset($product)? $product->cost:old('cost')}}" type="number"
                               id="cost" name="cost">
                        @if($errors->has('cost'))
                            <div class="error"
                                 style="color:red">{{$errors->first('cost')}}</div>
                        @endif
                    </div>

                    <div class="col-lg-4 col-sm-12 pd-b-20">
                        <label class="form-control-label">MSRP :</label>
                        <input class="form-control"
                               value="{{isset($product)? $product->msrp:old('msrp')}}" type="number" step="any"
                               id="msrp" name="msrp">
                        @if($errors->has('msrp'))
                            <div class="error"
                                 style="color:red">{{$errors->first('msrp')}}</div>
                        @endif
                    </div>


                    <div class="col-lg-4 col-sm-12 pd-b-20">
                        <label class="form-control-label">MAP<span class="tx-danger">*</span>:</label>
                        <input class="form-control" step="any" required
                               value="{{isset($product)? $product->map_price:old('map_price')}}" type="number"
                               id="map_price" name="map_price">
                        @if($errors->has('map_price'))
                            <div class="error"
                                 style="color:red">{{$errors->first('map_price')}}</div>
                        @endif
                    </div>

                </div>

                {{--start Feature--}}
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <label class="form-control-label">Featured:</label>
                    </div>
                    <div class="col-lg-2 col-sm-12">
                        <label class="rdiobox">
                            <input name="featured" value="1" type="radio"
                                   @if(isset($product) && $product->is_featured == 1) checked @endif>
                            <span>Yes</span>
                        </label>
                    </div>
                    <div class="col-lg-2 col-sm-12">
                        <label class="rdiobox">
                            <input name="featured" value="0" type="radio"
                                   @if(isset($product) && $product->is_featured == 0) checked
                                   @endif @if(!isset($product)) checked @endif >
                            <span>No</span>
                        </label>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        @if($errors->has('featured'))
                            <div class="error"
                                 style="color:red">{{$errors->first('featured')}}</div>
                        @endif
                    </div>
                </div>
                {{--end Feature--}}

                {{--start status--}}
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <label class="form-control-label">Status:</label>
                    </div>
                    <div class="col-lg-2 col-sm-12">
                        <label class="rdiobox">
                            <input name="status" value="1" type="radio"
                                   @if(isset($product) && $product->status == 1) checked @else checked @endif>
                            <span>Publish</span>
                        </label>
                    </div>

                    <div class="col-lg-3 col-sm-12">
                        <label class="rdiobox">
                            <input name="status" value="2" type="radio"
                                   @if(isset($product) && $product->status == 2) checked @endif>
                            <span>Draft</span>
                        </label>
                    </div>

                    <div class="col-lg-3 col-sm-12">
                        <label class="rdiobox">
                            <input name="status" value="0" type="radio"
                                   @if(isset($product) && $product->status == 0) checked @endif>
                            <span>Trash</span>
                        </label>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        @if($errors->has('status'))
                            <div class="error"
                                 style="color:red">{{$errors->first('status')}}</div>
                        @endif
                    </div>
                </div>
                {{--end status--}}

                <div class="row pd-b-20 pd-t-20">
                    <div class="col-lg-12 col-md-12 col-sm-12" style="text-align: center">
                        --------------------<strong class="text-info"> Other Detail </strong>--------------------
                    </div>
                </div>

                {{--Product Condition--}}
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <label class="form-control-label">Product Condition:</label>
                    </div>
                    <div class="col-lg-2 col-sm-12">
                        <label class="rdiobox">
                            <input name="qua_status" value="New" type="radio"
                                   @if(isset($product) && $product->qua_status == "New") checked @endif>
                            <span>New</span>
                        </label>
                    </div>
                    <div class="col-lg-2 col-sm-12">
                        <label class="rdiobox">
                            <input name="qua_status" value="Used" type="radio"
                                   @if(isset($product) && $product->qua_status == "Used") checked @endif>
                            <span>Used</span>
                        </label>
                    </div>
                    <div class="col-lg-2 col-sm-12">
                        <label class="rdiobox">
                            <input name="qua_status" value="Refurbished" type="radio"
                                   @if(isset($product) && $product->qua_status == "Refurbished") checked @endif>
                            <span>Refurbished</span>
                        </label>
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12">
                        @if($errors->has('status'))
                            <div class="error"
                                 style="color:red">{{$errors->first('status')}}</div>
                        @endif
                    </div>
                </div>
                {{--Product Condition--}}

                {{--Stock Status--}}
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <label class="form-control-label">Stock Status:</label>
                    </div>
                    <div class="col-lg-2 col-sm-12">
                        <label class="rdiobox">
                            <input name="stock_status" value="instock" type="radio"
                                   @if(isset($product) && $product->stock_status == "instock") checked @endif>
                            <span>In Stock</span>
                        </label>
                    </div>
                    <div class="col-lg-2 col-sm-12">
                        <label class="rdiobox">
                            <input name="stock_status" value="outofstock" type="radio"
                                   @if(isset($product) && $product->stock_status == "outofstock") checked @endif>
                            <span>Out Of Stock</span>
                        </label>
                    </div>
                    <div class="col-lg-2 col-sm-12">
                        <label class="rdiobox">
                            <input name="stock_status" value="onbackorder" type="radio"
                                   @if(isset($product) && $product->stock_status == "onbackorder") checked @endif>
                            <span>On Back Order</span>
                        </label>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        @if($errors->has('status'))
                            <div class="error"
                                 style="color:red">{{$errors->first('status')}}</div>
                        @endif
                    </div>
                </div>
                {{--Stock Status--}}

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 pd-b-20">
                        <label class="form-control-label">Stock Quantity :</label>
                        <input class="form-control"
                               value="{{isset($product)? $product->stock_quantity:old('stock_quantity')}}" type="number"
                               id="stock_quantity" name="stock_quantity">
                        @if($errors->has('stock_quantity'))
                            <div class="error"
                                 style="color:red">{{$errors->first('stock_quantity')}}</div>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 pd-b-20">
                        <label class="form-control-label">Short Description:</label>
                        <textarea id="short_desc"
                                  name="short_desc">{{isset($product)?$product->short_desc:old('short_desc')}}</textarea>
                        @if($errors->has('short_desc'))
                            <div class="error"
                                 style="color:red">{{$errors->first('short_desc')}}</div>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 pd-b-20">
                        <label class="form-control-label">Long Description:</label>
                        <textarea id="long_desc"
                                  name="long_desc">{{isset($product)?$product->long_desc:old('long_desc')}}</textarea>
                        @if($errors->has('long_desc'))
                            <div class="error"
                                 style="color:red">{{$errors->first('long_desc')}}</div>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 pd-b-20">
                        <label class="form-control-label">Additional Images:</label>
                        <input class="form-control" type="file" accept="image/*"
                               id="pro_img" name="pro_img[]" multiple>
                        @if($errors->has('pro_img'))
                            <div class="error"
                                 style="color:red">{{$errors->first('pro_img')}}</div>
                        @endif
                    </div>

                    <div class="col-lg-6 pd-b-20">
                        <label class="form-control-label">PDF (<strong class="text-info">Spec Sheet - URL</strong>):</label>
                        <input class="form-control"
                               value="{{isset($product)? $product->pdf_url:old('pdf_url')}}" type="text"
                               id="pdf_url" name="pdf_url">

                        @if($errors->has('pdf_url'))
                            <div class="error"
                                 style="color:red">{{$errors->first('pdf_url')}}</div>
                        @endif
                    </div>
                </div>

{{--                <div class="row">--}}
{{--                    <div class="col-lg-3 pd-b-20">--}}
{{--                        <label class="form-control-label">Weight (<strong class="text-info">LB</strong>)</label>--}}
{{--                        <input class="form-control"--}}
{{--                               value="{{isset($blog-post)? $blog-post->weight:old('weight')}}" type="number" step="any"--}}
{{--                               id="weight" name="weight" min="0.0000001">--}}

{{--                        @if($errors->has('weight'))--}}
{{--                            <div class="error"--}}
{{--                                 style="color:red">{{$errors->first('weight')}}</div>--}}
{{--                        @endif--}}
{{--                    </div>--}}

{{--                    <div class="col-lg-3 pd-b-20">--}}
{{--                        <label class="form-control-label">Height (<strong class="text-info">IN</strong>)</label>--}}
{{--                        <input class="form-control" min="0.0000001"--}}
{{--                               value="{{isset($blog-post)? $blog-post->height:old('height')}}" type="number" step="any"--}}
{{--                               id="height" name="height">--}}

{{--                        @if($errors->has('height'))--}}
{{--                            <div class="error"--}}
{{--                                 style="color:red">{{$errors->first('height')}}</div>--}}
{{--                        @endif--}}
{{--                    </div>--}}

{{--                    <div class="col-lg-3 pd-b-20">--}}
{{--                        <label class="form-control-label">Length (<strong class="text-info">IN</strong>)</label>--}}
{{--                        <input class="form-control" min="0.0000001"--}}
{{--                               value="{{isset($blog-post)? $blog-post->length:old('length')}}" type="number" step="any"--}}
{{--                               id="length" name="length">--}}

{{--                        @if($errors->has('length'))--}}
{{--                            <div class="error"--}}
{{--                                 style="color:red">{{$errors->first('length')}}</div>--}}
{{--                        @endif--}}
{{--                    </div>--}}

{{--                    <div class="col-lg-3 pd-b-20">--}}
{{--                        <label class="form-control-label">Width (<strong class="text-info">IN</strong>)</label>--}}
{{--                        <input class="form-control" min="0.0000001"--}}
{{--                               value="{{isset($blog-post)? $blog-post->width:old('width')}}" type="number" step="any"--}}
{{--                               id="width" name="width">--}}
{{--                        @if($errors->has('width'))--}}
{{--                            <div class="error"--}}
{{--                                 style="color:red">{{$errors->first('width')}}</div>--}}
{{--                        @endif--}}
{{--                    </div>--}}
{{--                </div>--}}
                <div class="row pd-b-20">
                    <div class="col-lg-12 col-sm-12 col-md-12">
                        <label class="form-control-label">Shipping Class</label>
                        <select name="shipping_class" class="form-control" id="">
                            <option selected disabled>Choose One</option>
                            @foreach($shippingClasses as $shipping)
                                <option value="{{$shipping->id}}" @if(isset($product->getShipping) && $product->getShipping->product_shipping_id == $shipping->id) selected @endif>{{$shipping->name}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('shipping_weight'))
                            <div class="error"
                                 style="color:red">{{$errors->first('shipping_weight')}}</div>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-3 pd-b-20">
                        <label class="form-control-label">Shipping Weight (<strong
                                class="text-info">LB</strong>)</label>
                        <input class="form-control" min="0.0000001"
                               value="{{isset($product)? $product->shipping_weight:old('shipping_weight')}}"
                               type="number" step="any"
                               id="shipping_weight" name="shipping_weight">

                        @if($errors->has('shipping_weight'))
                            <div class="error"
                                 style="color:red">{{$errors->first('shipping_weight')}}</div>
                        @endif
                    </div>

                    <div class="col-lg-3 pd-b-20">
                        <label class="form-control-label">Shipping Height (<strong
                                class="text-info">IN</strong>)</label>
                        <input class="form-control" min="0.0000001"
                               value="{{isset($product)? $product->shipping_height:old('shipping_height')}}"
                               type="number" step="any"
                               id="shipping_height" name="shipping_height">

                        @if($errors->has('shipping_height'))
                            <div class="error"
                                 style="color:red">{{$errors->first('shipping_height')}}</div>
                        @endif
                    </div>

                    <div class="col-lg-3 pd-b-20">
                        <label class="form-control-label">Shipping Length (<strong
                                class="text-info">IN</strong>)</label>
                        <input class="form-control" min="0.0000001"
                               value="{{isset($product)? $product->shipping_length:old('shipping_length')}}"
                               type="number" step="any"
                               id="shipping_length" name="shipping_length">

                        @if($errors->has('shipping_length'))
                            <div class="error"
                                 style="color:red">{{$errors->first('shipping_length')}}</div>
                        @endif
                    </div>

                    <div class="col-lg-3 pd-b-20">
                        <label class="form-control-label">Shipping Width (<strong class="text-info">IN</strong>)</label>
                        <input class="form-control" min="0.0000001"
                               value="{{isset($product)? $product->shipping_width:old('shipping_width')}}" type="number"
                               step="any"
                               id="shipping_width" name="shipping_width">
                        @if($errors->has('shipping_width'))
                            <div class="error"
                                 style="color:red">{{$errors->first('shipping_width')}}</div>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 pd-b-20">
                        <label class="form-control-label">Video URL:</label>
                        <input class="form-control"
                               value="{{isset($product)? $product->video_url:old('video_url')}}" type="text"
                               id="video_url" name="video_url">
                        @if($errors->has('video_url'))
                            <div class="error"
                                 style="color:red">{{$errors->first('video_url')}}</div>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 pd-b-20">
                        <label class="form-control-label">Warranty:</label>
                        <input class="form-control"
                               value="{{isset($product)? $product->warranty:old('warranty')}}" type="text"
                               id="warranty" name="warranty">
                        @if($errors->has('warranty'))
                            <div class="error"
                                 style="color:red">{{$errors->first('warranty')}}</div>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 pd-b-20">
                        <label class="form-control-label">Product Tags ( <strong class="text-info">Press Enter to add
                                new tag</strong> ):</label>
                        <input class="form-control"
                               value="{{isset($product)? $product->tags:old('tags')}}" type="text"
                               id="tags" name="tags" data-role="tagsinput">
                        @if($errors->has('tags'))
                            <div class="error"
                                 style="color:red">{{$errors->first('tags')}}</div>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-3">
                        <label class="ckbox">
                            <input type="checkbox" @if(isset($product) && $product->free_shipping == 1) checked
                                   @endif name="free_shipping" value="1"><span>Free Shipping</span>
                        </label>
                    </div><!-- col-3 -->
                </div>

                <div class="form-layout-footer">
                    <button type="submit" class="btn btn-primary bd-0"><i class="fa fa-save"></i> Save</button>
                </div>
            </form>
        </div>
    </div>
    {{--End Content--}}
@endsection

@push('script-section')
    <script src="{{asset('temp-assets/lib/bootstrap-tagsinput/js/bootstrap-tagsinput.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        // imgInp.onchange = evt => {
        //     $("#blah").css("display", "block");
        //     const [file] = imgInp.files
        //     if (file) {
        //         blah.src = URL.createObjectURL(file)
        //     }
        // }

        $('#short_desc').summernote();

        $('#long_desc').summernote();

        $('#metaDesc').summernote();


        'use strict';
        $('.select2').select2({
            minimumResultsForSearch: Infinity
        });

        $('.select2-show-search').select2({
            minimumResultsForSearch: Infinity
        });

        // Select2 by showing the search
        $('.select2-show-search').select2({
            minimumResultsForSearch: ''
        });

        // Colored Hover
        $('#select2-show-search').select2({
            dropdownCssClass: 'hover-success',
            minimumResultsForSearch: Infinity // disabling search
        });
    </script>
@endpush
