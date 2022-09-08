<div class="slim-header with-sidebar">
    <div class="container-fluid">
        <div class="slim-header-left">
            <h2 class="slim-logo"><a href="#"><small>Study Amazon</small></a></h2>
            <a href="" id="slimSidebarMenu" class="slim-sidebar-menu"><span></span></a>
            {{--            <form action="{{route('admin.vendor.list')}}" method="get">--}}
            {{--                <div class="search-box">--}}
            {{--                    <input type="text" class="form-control" --}}{{--value="{{isset($_GET['vendor_name'])?$_GET['vendor_name']:""}}"--}}{{-- name="vendor_name" placeholder="Brand/Vendor Name">--}}
            {{--                    <button class="btn btn-primary"><i class="fa fa-search"></i></button>--}}
            {{--                </div>--}}
            {{--            </form>--}}

        </div><!-- slim-header-left -->
        <div class="slim-header-right">
            <div class="dropdown dropdown-c">
                <a href="#" class="logged-user" data-toggle="dropdown">
                    <img src="{{asset('temp-assets/avatar.png')}}" alt="">
                    <span>{{auth()->user()->name}}</span>
                    <i class="fa fa-angle-down"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <nav class="nav">
                        <a href="{{--{{route('admin.user.view', encrypt(auth()->user()->id))}}--}}" class="nav-link"><i
                                class="icon ion-person"></i> View Profile</a>
                        <a href="{{--{{route('admin.user.edit', encrypt(auth()->user()->id))}}--}}" class="nav-link"><i
                                class="icon ion-compose"></i> Edit Profile</a>


                        <span class="nav-link">
                            <form action="{{ route('logout') }}" method="POST" class="ml-1 nav-link main-logout-form w-100">
                                {{ csrf_field() }}
                                <button type="submit" href="{{route('logout')}}" class="form-button logout-btn w-100 logout-btn">
                                    Sign Out
                                </button>
                            </form>
                        </span>
                    </nav>
                </div><!-- dropdown-menu -->
            </div><!-- dropdown -->
        </div><!-- header-right -->
    </div><!-- container-fluid -->
</div>
