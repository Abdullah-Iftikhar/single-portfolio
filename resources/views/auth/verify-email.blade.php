{{--<x-guest-layout>--}}
{{--    <x-auth-card>--}}
{{--        <x-slot name="logo">--}}
{{--            <a href="/">--}}
{{--                <x-application-logo class="w-20 h-20 fill-current text-gray-500"/>--}}
{{--            </a>--}}
{{--        </x-slot>--}}

{{--        <div class="mb-4 text-sm text-gray-600">--}}
{{--            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}--}}
{{--        </div>--}}

{{--        @if (session('status') == 'verification-link-sent')--}}
{{--            <div class="mb-4 font-medium text-sm text-green-600">--}}
{{--                {{ __('A new verification link has been sent to the email address you provided during registration.') }}--}}
{{--            </div>--}}
{{--        @endif--}}

{{--        <div class="mt-4 flex items-center justify-between">--}}
{{--            <form method="POST" action="{{ route('verification.send') }}">--}}
{{--                @csrf--}}

{{--                <div>--}}
{{--                    <x-button>--}}
{{--                        {{ __('Resend Verification Email') }}--}}
{{--                    </x-button>--}}
{{--                </div>--}}
{{--            </form>--}}

{{--            <form method="POST" action="{{ route('logout') }}">--}}
{{--                @csrf--}}

{{--                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">--}}
{{--                    {{ __('Log Out') }}--}}
{{--                </button>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </x-auth-card>--}}
{{--</x-guest-layout>--}}


<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Abdullah Iftikhar</title>

    <!-- vendor css -->
    <link href="{{asset('temp-assets/lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('temp-assets/lib/Ionicons/css/ionicons.css')}}" rel="stylesheet">
    <link href="{{asset('temp-assets/lib/perfect-scrollbar/css/perfect-scrollbar.min.css')}}" rel="stylesheet">
    <link href="{{asset('temp-assets/lib/bootstrap/css/bootstrap.css')}}" rel="stylesheet">
    <!-- Slim CSS -->
    <link rel="stylesheet" href="{{asset('temp-assets/css/slim.css')}}">
    <style>
        .logout {
            cursor:pointer;background: none; border: none
        }
    </style>

</head>
<body>

<div class="signin-wrapper">
    <div class="signin-box">
        <h2 class="slim-logo"><a href="#">Abdullah</a></h2>
        {{--        <h2 class="signin-title-primary">Welcome back!</h2>--}}
        {{--        <h3 class="signin-title-secondary">Sign in to continue.</h3>--}}
        <div class="row">
            <div class="col-md-12">
                <p>
                    Thanks for signing up! Before getting started, could you verify your email address by clicking on
                    the link we just emailed to you? If you didn't receive the email, we will gladly send you another.
                </p>
            </div>
        </div>


        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                <p class="text-success">
                    A new verification link has been sent to the email address you provided during registration.
                </p>
            </div>
        @endif
        <form action="{{route('verification.send')}}" method="post">
        @csrf
            <button type="submit" class="btn btn-primary btn-block btn-signin">Resend Verification Email</button>
        </form>


        <div class="row">
            <div class="col-md-12 col-sm-12 text-right">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 logout">Logout?</button>
                </form>
            </div>
        </div>


    </div><!-- signin-box -->

</div><!-- signin-wrapper -->

<script src="{{asset('temp-assets/lib/jquery/js/jquery.js')}}"></script>
<script src="{{asset('temp-assets/lib/popper.js/js/popper.js')}}"></script>
<script src="{{asset('temp-assets/lib/bootstrap/js/bootstrap.js')}}"></script>
<script src="{{asset('temp-assets/js/slim.js')}}"></script>
</body>
</html>


