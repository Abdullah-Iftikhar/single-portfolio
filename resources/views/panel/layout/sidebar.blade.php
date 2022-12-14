<div class="slim-sidebar">
    <label class="sidebar-label">Navigation</label>

    <ul class="nav nav-sidebar">
        <li class="sidebar-nav-item">
            <a href="{{route('dashboard')}}" class="sidebar-nav-link"><i class="icon ion-ios-home-outline"></i>
                Dashboard</a>
        </li>

        <li class="sidebar-nav-item">
            <a href="{{route('tag.index')}}" class="sidebar-nav-link">
                <i class="icon ion-ios-toggle"></i>Tags
            </a>
        </li>

        <li class="sidebar-nav-item">
            <a href="{{route('thumbnail.index')}}" class="sidebar-nav-link">
                <i class="icon ion-ios-thunderstorm"></i>Blog Image
            </a>
        </li>

        <li class="sidebar-nav-item">
            <a href="{{route('blog.create')}}" class="sidebar-nav-link"><i class="icon ion-ios-book"></i>
                Blog Post</a>
        </li>

{{--        <li class="sidebar-nav-item with-sub">--}}
{{--            <a href="" class="sidebar-nav-link"><i class="icon ion-person"></i>Vendor</a>--}}
{{--            <ul class="nav sidebar-nav-sub">--}}
{{--                <li class="nav-sub-item"><a href="{{route('admin.vendor.list')}}" class="nav-sub-link">List</a></li>--}}
{{--                <li class="nav-sub-item"><a href="{{route('admin.vendor.add')}}" class="nav-sub-link">Add</a></li>--}}
{{--                <li class="nav-sub-item"><a href="{{route('admin.promo.package.list')}}" class="nav-sub-link">Promo--}}
{{--                        Package</a></li>--}}
{{--                <li class="nav-sub-item"><a href="{{route('admin.vendor.rep.list')}}" class="nav-sub-link">Rep--}}
{{--                        Report</a></li>--}}

{{--            </ul>--}}
{{--        </li>--}}

{{--        <li class="sidebar-nav-item">--}}
{{--            <a href="{{route('admin.price.list')}}" class="sidebar-nav-link">--}}
{{--                <i class="icon ion-document-text"></i>Price List</a>--}}
{{--        </li>--}}
    </ul>
</div>
