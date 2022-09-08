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
                    This is a secure area of the application. Please confirm your password before continuing.
                </p>
            </div>
        </div>


        @if ($errors->any())
            <div class="text-danger mb-2">
                @foreach ($errors->all() as $error)
                    <span>{{ $error }}</span>
                @endforeach
            </div>
        @endif
        <form action="{{route('password.confirm')}}" method="post">
            @csrf
            <div class="form-group">
                <input type="password" name="password" value="{{old('password')}}" class="form-control"
                       placeholder="Enter your password" required>
            </div>

            <button type="submit" class="btn btn-primary btn-block btn-signin">Confirm</button>
        </form>
    </div><!-- signin-box -->

</div><!-- signin-wrapper -->

<script src="{{asset('temp-assets/lib/jquery/js/jquery.js')}}"></script>
<script src="{{asset('temp-assets/lib/popper.js/js/popper.js')}}"></script>
<script src="{{asset('temp-assets/lib/bootstrap/js/bootstrap.js')}}"></script>
<script src="{{asset('temp-assets/js/slim.js')}}"></script>
</body>
</html>












