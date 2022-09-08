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
        .notify-popup {
            position: absolute;
            right: 0;
            padding: 10px 30px 10px 10px;
            border-radius: 7px;
            top:35px;
        }
        .we-chat {
            display: grid;
            place-items: center;
        }
    </style>
</head>
<body>

<div class="signin-wrapper">
    <div class="signin-box">
        <h2 class="slim-logo"><a href="#">Abdullah</a></h2>
        {{--        <h2 class="signin-title-primary">Welcome back!</h2>--}}
        {{--        <h3 class="signin-title-secondary">Sign in to continue.</h3>--}}
        @if ($errors->any())
            <div class="text-danger mb-2">
                @foreach ($errors->all() as $error)
                    <span>{{ $error }}</span>
                @endforeach
            </div>
        @endif
        <form {{--action="{{route('register')}}"--}} method="post">
            @csrf
            <div class="form-group">
                <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Enter your full name" required>
            </div>

            <div class="form-group">
                <input type="email" name="email" value="{{old('email')}}" class="form-control" placeholder="Enter your email" required>
            </div>

            <div class="form-group">
                <input type="text" name="phone_number" value="{{old('phone_number')}}" class="form-control" placeholder="Enter your Phone Number" required>
            </div>

            <div class="form-group">
                <input type="password" name="password" value="{{old('password')}}" class="form-control" placeholder="Enter your password" required>
            </div>

            <div class="form-group">
                <input type="password" name="password_confirmation" value="{{old('password_confirmation')}}" class="form-control" placeholder="Enter your confirm password" required>
            </div>

            <button type="submit" class="btn btn-primary btn-block btn-signin">Sign Up</button>
        </form>

        <div class="row">

            <div class="col-md-12 col-sm-12 text-right">
                <a href="{{route('login')}}">Already registered?</a>
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








