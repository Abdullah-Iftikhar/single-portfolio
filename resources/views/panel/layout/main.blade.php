<!DOCTYPE html>
<html lang="en">
{{--Start Header--}}
@include('panel.layout.header')
{{--Start Header--}}
@stack('style-section')
<style>
    .notify-popup {
        position: absolute;
        right: 0;
        padding: 10px 30px 10px 10px;
        border-radius: 7px;
    }
    .ordering.asc {
        background: url({{asset('temp-assets/img/sort_asc.png')}}) no-repeat center right;
        background-color: #dee2e6;
    }
    .ordering.desc {
        background: url({{asset('temp-assets/img/sort_desc.png')}}) no-repeat center right;
        background-color: #dee2e6;
    }

    #preloader {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: black;
        opacity: 0.5;
    }
    #loader {
        display: block;
        position: relative;
        left: 50%;
        top: 50%;
        width: 150px;
        height: 150px;
        margin: -75px 0 0 -75px;
        border-radius: 50%;
        border: 3px solid transparent;
        border-top-color: #9370DB;
        -webkit-animation: spin 2s linear infinite;
        animation: spin 2s linear infinite;
    }
    #loader:before {
        content: "";
        position: absolute;
        top: 5px;
        left: 5px;
        right: 5px;
        bottom: 5px;
        border-radius: 50%;
        border: 3px solid transparent;
        border-top-color: #BA55D3;
        -webkit-animation: spin 3s linear infinite;
        animation: spin 3s linear infinite;
    }
    #loader:after {
        content: "";
        position: absolute;
        top: 15px;
        left: 15px;
        right: 15px;
        bottom: 15px;
        border-radius: 50%;
        border: 3px solid transparent;
        border-top-color: #FF00FF;
        -webkit-animation: spin 1.5s linear infinite;
        animation: spin 1.5s linear infinite;
    }
    @-webkit-keyframes spin {
        0%   {
            -webkit-transform: rotate(0deg);
            -ms-transform: rotate(0deg);
            transform: rotate(0deg);
        }
        100% {
            -webkit-transform: rotate(360deg);
            -ms-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }
    @keyframes spin {
        0%   {
            -webkit-transform: rotate(0deg);
            -ms-transform: rotate(0deg);
            transform: rotate(0deg);
        }
        100% {
            -webkit-transform: rotate(360deg);
            -ms-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }

    .logout-btn {
        background: blue; color: white; border-color: blue; cursor: pointer
    }
</style>
<body>
{{--Start Topbar--}}
@include('panel.layout.top_bar')
{{--End Topbar--}}
<div class="slim-body">
    {{--Start Sidebar--}}
    @include('panel.layout.sidebar')
    {{--End Sidebar--}}

    {{--Start Body--}}
    <div class="slim-mainpanel">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-12">
                    @if ($message = Session::get('success'))
                        <div class="alert notify-popup alert-success mb-2" id="alert-success-message" role="alert">
                            <strong>Success! </strong> {{$message}}
                        </div>
                    @endif
                    @if ($message = Session::get('error'))
                        <div class="alert notify-popup alert-danger mb-2" id="alert-error-message" role="alert">
                            <strong>Error! </strong> {{$message}}
                        </div>
                    @endif
                </div>
            </div>
            <div class="slim-pageheader">
                <ol class="breadcrumb slim-breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">@yield('page_title')</li>
                </ol>
                <h6 class="slim-pagetitle">@yield('page_title')</h6>
            </div>

            @yield('body')

            <div id="preloader" style="display: none">
                <div id="loader"></div>
            </div>
        </div>

        @include('panel.layout.footer_bar')
    </div>
    {{--End Body--}}

</div>
{{--Start Footer--}}
@include('panel.layout.footer')
{{--Start Footer--}}
@if ($message = Session::get('success'))
    <script>
        setTimeout(function(){
            document.getElementById('alert-success-message').style.display = 'none'
        }, 3000);
    </script>
@endif
@if ($message = Session::get('error'))
    <script>
        setTimeout(function(){
            document.getElementById('alert-error-message').style.display = 'none'
        }, 3000);
    </script>
@endif

<script>
    function getLoader() {
        // if ($('input:file').val().length != 0 || $('input:text').val().length != 0) {
        //     $("#preloader").css("display", "block");
            // setTimeout(function(){ $("#preloader").css("display", "none"); }, 1000);
        // }
        $("#preloader").css("display", "block");
        // setTimeout(function(){ $("#preloader").css("display", "none"); }, 10000);
    }
</script>

@stack('script-section')
</body>
</html>
