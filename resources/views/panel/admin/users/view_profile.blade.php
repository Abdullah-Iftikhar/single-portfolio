@extends('layout.main')

@push('style-section')
    <style>
        .social-flex {
            display: flex;
        }
    </style>

@endpush

@section('title')
    View Profile
@endsection

@section('page_title')
    View Profile
@endsection

@section('body')
{{--Start Content--}}
<div class="row row-sm">
    <div class="col-lg-12">
        <div class="card card-profile">
            <div class="card-body">
                <div class="media">
                    <img src="{{$user->img_url}}" alt="">
                    <div class="media-body">
                        <h3 class="card-profile-name">{{$user->fname}} {{$user->lname}}</h3>

                        <p class="mg-b-0 social-flex">
                            <i class="icon ion-ios-email-outline tx-24 lh-0"></i>
                            <span class="ml-2">{{$user->email}}</span>
                        </p>
                        <p class="mg-b-0 mt-2 social-flex">
                            <i class="icon ion-ios-telephone-outline tx-24 lh-0"></i>
                            <span class="ml-2">{{$user->phone}}</span>
                        </p>
                    </div><!-- media-body -->
                </div><!-- media -->
            </div><!-- card-body -->
            <div class="card-footer">
                <a href="" class="card-profile-direct"></a>
                <div>
                    <a href="{{route('admin.user.edit.pic', encrypt($user->id))}}"> <i class="fa fa-camera"></i>Update Picture</a>
                    <a href="{{route('admin.user.edit', encrypt($user->id))}}"><i class="fa fa-edit"></i> Edit Profile</a>
                </div>
            </div><!-- card-footer -->
        </div><!-- card -->

    </div><!-- col-8 -->

{{--    <div class="col-lg-4 mg-t-20 mg-lg-t-0">--}}
{{--        <div class="card card-connection">--}}
{{--            <div class="row row-xs">--}}
{{--                <div class="col-12">--}}
{{--                    <i class="fa fa-plane"></i>--}}
{{--                    <p></p>--}}
{{--                </div>--}}
{{--            </div><!-- row -->--}}
{{--        </div><!-- card -->--}}
{{--        <div class="card card-connection">--}}
{{--            <div class="row row-xs">--}}
{{--                <div class="col-4 tx-primary">129</div>--}}
{{--                <div class="col-8">people viewed your profile in the past 90 days</div>--}}
{{--            </div><!-- row -->--}}
{{--        </div>--}}

{{--    </div><!-- col-4 -->--}}
</div>
{{--End Content--}}
@endsection
