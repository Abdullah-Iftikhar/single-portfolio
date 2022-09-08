@extends('panel.layout.main')
@section('title')
    Dashboard
@endsection
@push('style-section')
    <link href="{{asset('temp-assets/lib/morris.js/css/morris.css')}}" rel="stylesheet">
@endpush
@section('page_title')
    Dashboard
@endsection
@section('body')
{{--    <div class="row row-xs">--}}
{{--        <div class="col-sm-6 col-lg-3">--}}
{{--            <div class="card card-status">--}}
{{--                <div class="media">--}}
{{--                    <i class="icon ion-grid tx-purple"></i>--}}
{{--                    <div class="media-body">--}}
{{--                        <h1>{{$activePro}}</h1>--}}
{{--                        <p>Active Products</p>--}}
{{--                    </div><!-- media-body -->--}}
{{--                </div><!-- media -->--}}
{{--            </div><!-- card -->--}}
{{--        </div><!-- col-3 -->--}}
{{--        <div class="col-sm-6 col-lg-3">--}}
{{--            <div class="card card-status">--}}
{{--                <div class="media">--}}
{{--                    <i class="icon ion-person tx-primary"></i>--}}
{{--                    <div class="media-body">--}}
{{--                        <h1>{{$totalBrands}}</h1>--}}
{{--                        <p>Total Brands</p>--}}
{{--                    </div><!-- media-body -->--}}
{{--                </div><!-- media -->--}}
{{--            </div><!-- card -->--}}
{{--        </div><!-- col-3 -->--}}
{{--        <div class="col-sm-6 col-lg-3">--}}
{{--            <div class="card card-status">--}}
{{--                <div class="media">--}}
{{--                    <i class="icon ion-clipboard tx-teal"></i>--}}
{{--                    <div class="media-body">--}}
{{--                        <h2 style="font-size: 20px">${{number_format($currentYearRev,2)}}</h2>--}}
{{--                        <p>This Year (<small class="text-info">{{\Carbon\Carbon::now()->format('Y')}}</small>)</p>--}}
{{--                    </div><!-- media-body -->--}}
{{--                </div><!-- media -->--}}
{{--            </div><!-- card -->--}}
{{--        </div><!-- col-3 -->--}}
{{--        <div class="col-sm-6 col-lg-3">--}}
{{--            <div class="card card-status">--}}
{{--                <div class="media">--}}
{{--                    <i class="icon ion-clipboard tx-pink"></i>--}}
{{--                    <div class="media-body">--}}
{{--                        <h2 style="font-size: 20px">${{number_format($eoyYearRev,2)}}</h2>--}}
{{--                        <p>EOY (<small class="text-info">{{\Carbon\Carbon::now()->format('Y')}}</small>)</p>--}}
{{--                    </div><!-- media-body -->--}}
{{--                </div><!-- media -->--}}
{{--            </div><!-- card -->--}}
{{--        </div><!-- col-3 -->--}}
{{--    </div><!-- row -->--}}

{{--    <div class="card mg-t-10">--}}
{{--        <div class="row row-xs">--}}
{{--            <div class="col-xl-12 col-sm-12 col-lg-12 col-md-12">--}}
{{--                <div id="revenueDetail" class="ht-200 ht-sm-300 bd"></div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <div class="row row-xs mg-t-10">--}}
{{--        <div class="col-lg-6 col-xl-6 mg-t-10 mg-lg-t-0">--}}
{{--            <div class="card card-table">--}}
{{--                <div class="card-header">--}}
{{--                    <h6 class="slim-card-title float-left">Alerts</h6>--}}
{{--                    <a href="" data-toggle="modal" data-target="#alert_modal" style="float:right;    margin-top: -6px;"><i--}}
{{--                            class="fa fa-plus"></i></a>--}}
{{--                </div><!-- card-header -->--}}
{{--                <div class="card-people-list pd-20">--}}
{{--                    <div class=media-list">--}}
{{--                        @if($dashboardAlerts->count()>0)--}}
{{--                            @foreach($dashboardAlerts as $repKey => $alert)--}}
{{--                                @if($repKey < 5)--}}
{{--                                    <div class="media">--}}
{{--                                        <img--}}
{{--                                            src="{{isset($alert->getUploadBy)?asset('user_img/'.$alert->getUploadBy->img):"http://via.placeholder.com/500x500"}}"--}}
{{--                                            alt="">--}}

{{--                                        <div class="media-body" onclick="getCommentView('{{$alert->id}}')"--}}
{{--                                             style="cursor: pointer">--}}
{{--                                            --}}{{--                                            <a href="{{route('admin.user.view', encrypt($alert->getUploadBy->id))}}" class="tx-12">--}}
{{--                                            --}}{{--                                            </a>--}}
{{--                                            <div class="tx-12 w-100">--}}
{{--                                                <strong--}}
{{--                                                    class="text-info">{{$alert->getUploadBy->fname}} {{$alert->getUploadBy->lname}}</strong>--}}
{{--                                                @if($alert->status == 2)--}}
{{--                                                    <small class="float-right"> <i--}}
{{--                                                            class="fa fa-check text-success mg-r-2"></i>--}}
{{--                                                        Completed</small>--}}
{{--                                                @endif--}}
{{--                                            </div>--}}
{{--                                            <div class="text-12">--}}
{{--                                                <p class="tx-12">{{$alert['note']}}</p>--}}
{{--                                                <span class="tx-12"> <strong>Date: </strong>{{$alert->created_at->format('Y-m-d H:i:s')}}</span>--}}
{{--                                            </div>--}}
{{--                                        </div><!-- media-body -->--}}
{{--                                    </div>--}}
{{--                                @endif--}}
{{--                            @endforeach--}}
{{--                        @else--}}
{{--                            <p>No rep available yet.</p>--}}
{{--                        @endif--}}
{{--                    </div><!-- media-list -->--}}
{{--                </div><!-- card -->--}}
{{--                <div class="card-footer tx-12 pd-y-15 bg-transparent">--}}
{{--                    <a href="{{route('alerts.list')}}"><i class="fa fa-angle-down mg-r-5"></i>View All Alerts</a>--}}
{{--                </div><!-- card-footer -->--}}
{{--            </div><!-- card -->--}}
{{--        </div><!-- col-3 -->--}}

{{--        <div class="col-lg-6 col-xl-6 mg-t-10 mg-lg-t-0">--}}
{{--            <div class="card card-table">--}}
{{--                <div class="card-header">--}}
{{--                    <h6 class="slim-card-title">Featured Brand Reps</h6>--}}
{{--                </div><!-- card-header -->--}}
{{--                <div class="card-people-list pd-20">--}}
{{--                    <div class=media-list">--}}
{{--                        @if(count($feaVenRep)>0)--}}
{{--                            @foreach($feaVenRep as $repKey => $representative)--}}
{{--                                @if($repKey < 5)--}}
{{--                                    <div class="media">--}}
{{--                                        <img src="http://via.placeholder.com/500x500" alt="">--}}
{{--                                        <div class="media-body">--}}
{{--                                            <a href="{{route('admin.vendor.detail', encrypt($representative['vendor']))}}">{{$representative['name']}}</a>--}}
{{--                                            <p class="tx-12"><strong>Brand</strong>: {{$representative['vendor_name']}}--}}
{{--                                            </p>--}}
{{--                                            <p class="tx-12">{{$representative['email']}}</p>--}}
{{--                                            <p class="tx-12">{{$representative['phone']}}</p>--}}
{{--                                        </div><!-- media-body -->--}}
{{--                                    </div>--}}
{{--                                @endif--}}
{{--                            @endforeach--}}
{{--                        @else--}}
{{--                            <p>No rep available yet.</p>--}}
{{--                        @endif--}}
{{--                    </div><!-- media-list -->--}}
{{--                </div><!-- card -->--}}
{{--                <div class="card-footer tx-12 pd-y-15 bg-transparent">--}}
{{--                    <a href="{{route('admin.fea.ven.rep')}}"><i class="fa fa-angle-down mg-r-5"></i>View All People</a>--}}
{{--                </div><!-- card-footer -->--}}
{{--            </div><!-- card -->--}}
{{--        </div><!-- col-3 -->--}}
{{--    </div>--}}


{{--    <div class="row row-xs mg-t-10">--}}
{{--        <div class="col-lg-6">--}}
{{--            <div class="card card-table">--}}
{{--                <div class="card-header">--}}
{{--                    <h6 class="slim-card-title">Price Updates</h6>--}}
{{--                </div><!-- card-header -->--}}
{{--                <div class="table-responsive">--}}
{{--                    <table class="table mg-b-0 tx-13">--}}
{{--                        <thead>--}}
{{--                        <tr class="tx-10">--}}
{{--                            <th class="wd-10p pd-y-5">&nbsp;</th>--}}
{{--                            <th class="pd-y-5">Brand</th>--}}
{{--                            <th class="pd-y-5">Store</th>--}}
{{--                            <th class="pd-y-5">Date</th>--}}
{{--                        </tr>--}}
{{--                        </thead>--}}
{{--                        <tbody>--}}
{{--                        @if($storeUpdates->count() > 0)--}}
{{--                            @foreach($storeUpdates as $update)--}}
{{--                                <tr>--}}
{{--                                    <td class="pd-l-20">--}}
{{--                                        @if(isset($update->getUploadBy->img))--}}
{{--                                            @if(file_exists(asset('user_img/'.$update->getUploadBy->img)))--}}
{{--                                                <img src="{{asset('user_img/'.$update->getUploadBy->img)}}"--}}
{{--                                                     class="wd-36 rounded-circle"--}}
{{--                                                     alt="Image">--}}
{{--                                            @else--}}
{{--                                                <img src="http://via.placeholder.com/500x500" class="wd-36 rounded-circle"--}}
{{--                                                     alt="Image">--}}
{{--                                            @endif--}}
{{--                                        @else--}}
{{--                                            <img src="http://via.placeholder.com/500x500" class="wd-36 rounded-circle"--}}
{{--                                                 alt="Image">--}}
{{--                                        @endif--}}

{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        <a href=""--}}
{{--                                           class="tx-inverse tx-14 tx-medium d-block">{{isset($update->getVendor)?$update->getVendor->vendor_name:""}}</a>--}}
{{--                                        <span class="tx-11 d-block"><a target="_blank"--}}
{{--                                                                       href="{{isset($update->getVendor)?$update->getVendor->website:""}}">{{isset($update->getVendor)?$update->getVendor->website:""}}</a></span>--}}
{{--                                    </td>--}}
{{--                                    <td class="tx-12">--}}
{{--                                        --}}{{--<span class="square-8 bg-success mg-r-5 rounded-circle"></span>--}}
{{--                                        @if($update->store == "pss")--}}
{{--                                            PSS--}}
{{--                                        @else--}}
{{--                                            PSSAV--}}
{{--                                        @endif--}}
{{--                                    </td>--}}
{{--                                    <td>{{$update->created_at->diffForHumans()}}</td>--}}
{{--                                </tr>--}}
{{--                            @endforeach--}}
{{--                        @else--}}
{{--                            No Update yet.--}}
{{--                        @endif--}}
{{--                        </tbody>--}}
{{--                    </table>--}}
{{--                </div><!-- table-responsive -->--}}
{{--                <div class="card-footer tx-12 pd-y-15 bg-transparent">--}}
{{--                    <a href="{{route('admin.price.update')}}"><i class="fa fa-angle-down mg-r-5"></i>View All--}}
{{--                        History</a>--}}
{{--                </div><!-- card-footer -->--}}
{{--            </div><!-- card -->--}}
{{--        </div><!-- col-6 -->--}}
{{--        <div class="col-lg-6 col-xl-6">--}}
{{--            <div class="card card-table">--}}
{{--                <div class="card-header">--}}
{{--                    <h6 class="slim-card-title">Recent Activities</h6>--}}
{{--                </div><!-- card-header -->--}}
{{--                <div class="card-activities pd-20">--}}
{{--                    @if($recentAct->count()>0)--}}
{{--                        <div class="media-list">--}}
{{--                            @foreach($recentAct as $key=>$activities)--}}
{{--                                <div class="media">--}}
{{--                                    <div class="activity-icon bg-primary">--}}
{{--                                        <i class="icon @if($activities->type == "brand") ion-person--}}
{{--                                        @endif @if($activities->type == "product") ion-grid @endif--}}
{{--                                        @if($activities->type == "category") ion-grid @endif--}}
{{--                                        @if($activities->type == "price_list") ion-document-text @endif">--}}
{{--                                        </i>--}}
{{--                                    </div><!-- activity-icon -->--}}
{{--                                    <div class="media-body">--}}
{{--                                        <h6>{{$activities->title}}</h6>--}}
{{--                                        <p>{{$activities->desc}}</p>--}}
{{--                                        <span>{{$activities->created_at->diffForHumans()}} <strong>by</strong> <a--}}
{{--                                                href="{{route('admin.user.view', encrypt($activities->getUploadBy->id))}}">{{$activities->getUploadBy->fname}} {{$activities->getUploadBy->lname}}</a></span>--}}
{{--                                    </div><!-- media-body -->--}}
{{--                                </div><!-- media -->--}}
{{--                            @endforeach--}}
{{--                        </div><!-- media-list -->--}}
{{--                    @else--}}
{{--                        <p>No activity yet.</p>--}}
{{--                    @endif--}}
{{--                </div><!-- card -->--}}

{{--                <div class="card-footer tx-12 pd-y-15 bg-transparent">--}}
{{--                    <a href="{{route('admin.recent.activity')}}"><i class="fa fa-angle-down mg-r-5"></i>View All--}}
{{--                        Activities</a>--}}
{{--                </div><!-- card-footer -->--}}
{{--            </div><!-- card -->--}}

{{--        </div><!-- col-9 -->--}}


{{--    </div><!-- row -->--}}


{{--    <!-- Alerts Model -->--}}
{{--    <div id="alert_modal" class="modal fade">--}}
{{--        <div class="modal-dialog modal-dialog-vertical-center" role="document">--}}
{{--            <div class="modal-content bd-0 tx-14">--}}
{{--                <div class="modal-header">--}}
{{--                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add Notes</h6>--}}
{{--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                        <span aria-hidden="true">&times;</span>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--                <form data-parsley-validate action="{{route('admin.post.alert')}}" method="post"--}}
{{--                      enctype="multipart/form-data">--}}
{{--                    @csrf--}}
{{--                    <div class="modal-body pd-25">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-md-12 col-sm-12 col-lg-12">--}}
{{--                                <label class="form-control-label">Brand (<strong--}}
{{--                                        class="text-info">Optional</strong>)</label>--}}
{{--                                <select name="brand" class="form-control" id="">--}}
{{--                                    <option selected disabled>Choose One</option>--}}
{{--                                    @foreach($vendors  as $brand)--}}
{{--                                        <option value="{{$brand->id}}">{{$brand->vendor_name}}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                                @if($errors->has('rep_name'))--}}
{{--                                    <div class="error"--}}
{{--                                         style="color:red">{{$errors->first('price_list')}}</div>--}}
{{--                                @endif--}}
{{--                            </div>--}}

{{--                            <div class="col-md-12 col-sm-12 col-lg-12 mg-b-2">--}}
{{--                                <label class="form-control-label">Note <span class="text-danger">*</span></label>--}}
{{--                                <textarea required name="note" id="" cols="60" rows="10"--}}
{{--                                          class="form-control"></textarea>--}}
{{--                            </div>--}}

{{--                            <div class="col-md-12 col-sm-12 col-lg-12">--}}
{{--                                <label class="ckbox">--}}
{{--                                    <input type="checkbox" value="1" name="notify"><span>Email Notify</span>--}}
{{--                                </label>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="modal-footer">--}}
{{--                        <button type="submit" class="btn btn-primary">Save</button>--}}
{{--                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div><!-- modal-dialog -->--}}
{{--    </div><!-- modal -->--}}
{{--    --}}{{--Alerts Model--}}

{{--    --}}{{--Start Alert Comments--}}
{{--    <div id="alert_comments" class="modal fade">--}}
{{--        <div class="modal-dialog modal-dialog-vertical-center" role="document">--}}
{{--            <div class="modal-content bd-0 tx-14" id="alertCommentsModal">--}}

{{--            </div>--}}
{{--        </div><!-- modal-dialog -->--}}
{{--    </div><!-- modal -->--}}
{{--    --}}{{--End Alert Comments--}}

@endsection

@push('script-section')
{{--    <script src="{{asset('temp-assets/lib/morris.js/js/morris.js')}}"></script>--}}
{{--    <script src="{{asset('temp-assets/lib/raphael/js/raphael.min.js')}}"></script>--}}
{{--    <script src="{{asset('temp-assets/js/chart.morris.js')}}"></script>--}}
{{--    <script>--}}
{{--        'use strict';--}}
{{--        new Morris.Bar({--}}
{{--            element: 'revenueDetail',--}}
{{--            data: [--}}
{{--                    @foreach($curYearRec as $key=>$yearVal)--}}
{{--                {--}}
{{--                    y: '{{$yearVal->month}}',--}}
{{--                    a: {{$yearVal->TotalMonthValue}},--}}
{{--                    b: {{isset($curYearPss[$key])?$curYearPss[$key]->TotalMonthValue:0}},--}}
{{--                    c: {{isset($curYearPssav[$key])?$curYearPssav[$key]->TotalMonthValue:0}} },--}}
{{--                @endforeach--}}
{{--            ],--}}
{{--            xkey: 'y',--}}
{{--            ykeys: ['a', 'b', 'c'],--}}
{{--            labels: ['Total', 'PSS', 'PSSAV'],--}}
{{--            barColors: ['#5058AB', '#14A0C1', '#01CB99'],--}}
{{--            gridTextSize: 11,--}}
{{--            hideHover: 'auto',--}}
{{--            resize: true--}}
{{--        });--}}

{{--        function getCommentView(id) {--}}
{{--            $.ajax({--}}
{{--                url: '{{route('admin.alert.comment')}}',--}}
{{--                type: 'post',--}}
{{--                data: {--}}
{{--                    'id': id,--}}
{{--                    "_token": "{{ csrf_token() }}",--}}
{{--                },--}}
{{--                success: function (data) {--}}
{{--                    $('#alertCommentsModal').html(data);--}}
{{--                    $('#alert_comments').modal('show');--}}

{{--                }--}}
{{--            });--}}
{{--        }--}}
{{--    </script>--}}
@endpush
