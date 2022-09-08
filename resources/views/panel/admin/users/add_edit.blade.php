@extends('layout.main')

@push('style-section')
    <style>
        .select2-container {
            width: 100% !important;
        }

        .password-view {
            position: absolute;
            right: 20px;
            top: 40px;
        }

        .fail {
            color: red;
        }
        .pass {
            color: green;
        }

        .pwordContainer {
            margin-bottom: 8px;
            position: relative;
            width: 450px;
        }
        .custom_tooltip h4 {
            margin: 0px;
            padding: 0px;
            margin-bottom: 5px;
        }
        .custom_tooltip {
            color: #fff;
            background-color: #222223;
            position: absolute;
            z-index: 5;
            right: -172px;
            top: -33px;
            border: 1px solid gray;
            padding: 10px 12px;
            display: none;
            -webkit-box-shadow: 10px 10px 5px -6px rgba(0, 0, 0, 0.29);
            -moz-box-shadow: 10px 10px 5px -6px rgba(0, 0, 0, 0.29);
            box-shadow: 10px 10px 5px -6px rgba(0, 0, 0, 0.29);
        }

        .custom_tooltip:after {
            bottom: 50%;
            left: -8px;
            border: solid transparent;
            content: " ";
            height: 0;
            width: 0;
            position: absolute;
            pointer-events: none;
            border-color: rgba(255, 255, 255, 0);
            /*border-bottom-color: #000;*/
            border-right-color: #222223;
            border-width: 8px;
            margin-left: -8px;
        }

        .alltogCont {
            margin-top: 10px;
        }
        .instructions {
            margin-top: 10px;
            font-style: italic;
            font-size: 12px;
        }

        /* SUPPLY checkbox */
        .supplyTextBox {
            width: 20px;
            position: relative;
            /*margin: 20px auto;*/
            float: left;
            padding-right: 10px;
        }
        .supplyTextBox label {
            width: 20px;
            height: 20px;
            cursor: pointer;
            position: absolute;
            top: 0;
            left: 0;
            background: #fff;
            border-radius: 0px;
            border: 1px solid #222223;
        }
        .supplyTextBox label:after {
            content: "";
            width: 9px;
            height: 5px;
            position: absolute;
            top: 4px;
            left: 4px;
            border: 3px solid #fff;
            border-top: none;
            border-right: none;
            background: transparent;
            opacity: 0;
            -webkit-transform: rotate(-45deg);
            transform: rotate(-45deg);
        }
        .supplyTextBox label:hover::after {
            opacity: 0.3;
        }
        .supplyTextBox input[type="checkbox"] {
            visibility: hidden;
        }
        .supplyTextBox input[type="checkbox"]:checked .supplyTextBox label {
            background-color: #228848;
        }
        .supplyTextBox input[type="checkbox"]:checked + label {
            background-color: #228848;
        }
        .supplyTextBox input[type="checkbox"]:checked + label:after {
            opacity: 1;
        }

    </style>
@endpush

@section('title')
    {{isset($user)?"Edit User":"Add User"}}
@endsection

@section('page_title')
    {{isset($user)?"Edit User":"Add User"}}
@endsection

@section('body')
    {{--Start Content--}}
    <div class="section-wrapper">
        <div class="mg-t-40">
            {{--            @dd($user->getPermVendors, $user->getPermVendors[0]->getVendor)--}}
            <form method="post"
                  action="{{isset($user)? route('admin.user.update.data', encrypt($user->id)):route('admin.user.post.data')}}"
                  enctype="multipart/form-data" data-parsley-validate>
                @csrf

                <div class="row">
                    <div class="col-lg-4 pd-b-20">
                        <label class="form-control-label">First Name: <span class="tx-danger">*</span></label>
                        <input class="form-control" value="{{isset($user)? $user->fname:old('first_name')}}" type="text"
                               id="FirstName" name="first_name" required="">
                        @if($errors->has('first_name'))
                            <div class="error"
                                 style="color:red">{{$errors->first('first_name')}}</div>
                        @endif
                    </div>

                    <div class="col-lg-4 pd-b-20">
                        <label class="form-control-label">Last Name:</label>
                        <input class="form-control" type="text" id="LastName"
                               value="{{isset($user)? $user->lname:old('last_name')}}" name="last_name">
                        @if($errors->has('last_name'))
                            <div class="error"
                                 style="color:red">{{$errors->first('last_name')}}</div>
                        @endif
                    </div>

                    <div class="col-lg-4 pd-b-20">
                        <label class="form-control-label">Phone: <span class="tx-danger">*</span></label>
                        <input id="phoneMask" type="text" class="form-control" placeholder="(999) 999-9999"
                               value="{{isset($user)? $user->phone:old('phone')}}" name="phone" required="">
                        @if($errors->has('phone'))
                            <div class="error"
                                 style="color:red">{{$errors->first('phone')}}</div>
                        @endif
                    </div>

                    <div class="col-lg-4 pd-b-20">
                        <label class="form-control-label">E-Mail Address: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="email" placeholder="example@abc.com"
                               value="{{isset($user)? $user->email:old('email')}}" id="email" name="email" required="">
                        @if($errors->has('email'))
                            <div class="error"
                                 style="color:red">{{$errors->first('email')}}</div>
                        @endif
                    </div>

                    <div class="col-lg-4 pd-b-20 pwordContainer">
                        <label class="form-control-label">Password: <span class="tx-danger">*</span></label>
                        <input class="form-control pword" type="password" id="password_open" name="password" value=""
                               autocomplete="new-password"  @if(!isset($user))required @endif
                               placeholder="*******">
                        <span class="password-view" onclick="passwordOpen()"><i class="fa fa-eye"></i></span>
                        <div class="custom_tooltip">
                            <div>
                                8 Characters  : <span class="passfail passfailSix"><span class="fail">Fail</span></span>
                            </div>
                            <div>
                                1 LowerCase  : <span class="passfail passfailLower"><span class="fail">Fail</span></span>
                            </div>
                            <div>
                                1 Uppercase  : <span class="passfail passfailUpper"><span class="fail">Fail</span></span>
                            </div>
                            <div>
                                1 Number  : <span class="passfail passfailNum"><span class="fail">Fail</span></span>
                            </div>
                            <div>
                                1 Special Character  : <span class="passfail passfailSpecial"><span class="fail">Fail</span></span>
                            </div>
                            <hr />
                            <div class="alltogCont">
                                Good Password  : <span class="passfail passfailAll"><span class="fail">Fail</span></span><span class="checkmark">&#x2714;</span>
                            </div>
                        </div>

                        <div class="instructions">
                            NOTE:   Passwords must be at least 8 characters, 1 uppercase letter, 1 lowercase letter, 1 number and 1 special character.
                        </div>

                        @if($errors->has('password'))
                            <div class="error"
                                 style="color:red">{{$errors->first('password')}}</div>
                        @endif
                    </div>

                    <div class="col-lg-4 pd-b-20">
                        <label class="form-control-label">Re-type Password: <span class="tx-danger">*</span></label>
                        <input class="form-control" id="re_password_open" type="password" name="retype_password"
                               value=""
                               autocomplete="new-password" @if(!isset($user))required @endif
                               placeholder="*******">
                        <span class="password-view" onclick="rePasswordOpen()"><i class="fa fa-eye"></i></span>
                        @if($errors->has('retype_password'))
                            <div class="error"
                                 style="color:red">{{$errors->first('retype_password')}}</div>
                        @endif
                    </div>

                    <div class="col-lg-12 pd-b-20">
                        <label class="form-control-label">Image</label>
                        <input class="form-control" type="file" accept="image/*"
                               id="imgInp" name="image">
                        @if($errors->has('image'))
                            <div class="error"
                                 style="color:red">{{$errors->first('image')}}</div>
                        @endif
                        <img style="margin-top:10px; {{isset($user) ? "display: block" : "display: none"}}" width="150"
                             height="150" id="blah" src="{{isset($user->img_url) ? $user->img_url : "#"}}"/>
                    </div>
                </div>

                <div class="row mg-b-20 mg-t-10">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <label class="form-control-label">Role: <span class="tx-danger">*</span></label>
                    </div>
                    <div class="col-lg-2 col-sm-12">
                        <label class="rdiobox">
                            <input name="role" class="selectedRole" value="is_admin" type="radio" required
                                   @if(isset($user) && $user->role == 'admin') checked @endif>
                            <span>Admin</span>
                        </label>
                    </div>
                    <div class="col-lg-2 col-sm-12">
                        <label class="rdiobox">
                            <input name="role" class="selectedRole" value="is_manager" type="radio" required
                                   @if(isset($user) && $user->role == 'manager') checked @endif>
                            <span>Manager</span>
                        </label>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        @if($errors->has('role'))
                            <div class="error"
                                 style="color:red">{{$errors->first('role')}}</div>
                        @endif
                    </div>
                    @if($errors->has('vendors'))
                        <div class="error"
                             style="color:red">Please check the all vendors or select some vendors from drop down after
                            select manager
                        </div>
                    @endif
                </div>

                <div class="row mg-b-20 mg-t-10">
                    <div class="col-lg-2 col-sm-12">
                        <label class="ckbox">
                            <input type="checkbox" name="send_email"
                                   value="yes"><span>Send Mail</span>
                        </label>
                    </div>
                </div>

                <div class="row mg-b-20 mg-t-10"
                     style="@if(isset($user) && $user->all_vendor_access != 0 || isset($user->getPermVendors)) display: block  @else display: none @endif"
                     id="secForManager">
                    <div class="col-md-12 col-sm-12 col-lg-12">
                        <label class="form-control-label">Select Vendors For Manager <span
                                class="tx-danger">*</span></label>
                    </div>

                    <div class="col-lg-2 col-sm-12">
                        <label class="ckbox">
                            <input type="checkbox" @if(isset($user) && $user->all_vendor_access == 1) checked
                                   @endif id="allVendorChecked" onchange="allVendorCheck()" name="all_vendors"
                                   value="yes"><span>All Vendors</span>
                        </label>
                    </div>

                    <div class="col-lg-12 col-sm-12" id="vendorDropDown">
                        @if($vendors->count() > 0)
                            <select name="vendors[]" class="form-control select2" data-placeholder="Choose Vendors"
                                    multiple>
                                @if(isset($user) && $user->all_vendor_access != 1)
                                    @if(isset($user->getPermVendors) && $user->getPermVendors->count()>0)
                                        @foreach($user->getPermVendors as $perm)
                                            @if(isset($perm->getVendor))
                                                <option value="{{$perm->getVendor->id}}"
                                                        selected>{{$perm->getVendor->vendor_name}}</option>
                                            @endif
                                        @endforeach
                                    @endif
                                @endif

                                @foreach($vendors as $vendorRoc)
                                    <option value="{{$vendorRoc->id}}">{{$vendorRoc->vendor_name}}</option>
                                @endforeach
                            </select>
                        @else
                            Please add some vendors.
                        @endif
                    </div>
                </div>

                <div class="form-layout-footer">
                    <button type="submit" class="btn btn-primary bd-0">
                        <i class="fa fa-save mr-1"></i>Save
                    </button>
                </div>
            </form>
        </div>
    </div>
    {{--End Content--}}
@endsection

@push('script-section')
    <script src="{{asset('temp-assets/lib/jquery.maskedinput/js/jquery.maskedinput.js')}}"></script>
    <script src="https://use.typekit.net/cpa1pzo.js"></script>
    <script>
        try {
            Typekit.load({async: true});
        } catch (e) {
        }

        //Password check
        var passwordregex8digits = new RegExp("^(?=.{8,})");
        var passwordregexLowercase = new RegExp("^(?=.*[a-z])");
        var passwordregexUppercase = new RegExp("^(?=.*[A-Z])");
        var passwordregexNumber = new RegExp("^(?=.*[0-9])");
        var passwordRegexSpecial = new RegExp("^(?=.*[!@#$%^&*])");
        var passwordRegexAll = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*])(?=.{8,})");

        $(".pword").on('keyup', function () {
            var thepassword = $(".pword").val();
            checkpassword(thepassword);
        });

        var checkpassword = function (thisPassword) {
            console.log(thisPassword);
            if (passwordregex8digits.test(thisPassword)) {
                $(".passfailSix").html('<span class="pass">Pass</span>');
            } else {
                $(".passfailSix").html('<span class="fail">Fail</span>');
            }

            if (passwordregexLowercase.test(thisPassword)) {
                $(".passfailLower").html('<span class="pass">Pass</span>');
            } else {
                $(".passfailLower").html('<span class="fail">Fail</span>');
            }

            if (passwordregexUppercase.test(thisPassword)) {
                $(".passfailUpper").html('<span class="pass">Pass</span>');
            } else {
                $(".passfailUpper").html('<span class="fail">Fail</span>');
            }

            if (passwordregexNumber.test(thisPassword)) {
                $(".passfailNum").html('<span class="pass">Pass</span>');
            } else {
                $(".passfailNum").html('<span class="fail">Fail</span>');
            }

            if (passwordRegexSpecial.test(thisPassword)) {
                $(".passfailSpecial").html('<span class="pass">Pass</span>');
            } else {
                $(".passfailSpecial").html('<span class="fail">Fail</span>');
            }
            if (passwordRegexAll.test(thisPassword)) {
                $(".passfailAll").html('<span class="pass">Pass</span>');
                $(".checkmark").show();
            } else {
                $(".passfailAll").html('<span class="fail">Fail</span>');
                $(".checkmark").hide();
            }
        };

        $(".pword").on("focus", function () {
            var thepassword = $(".pword").val();
            checkpassword(thepassword);
            $(".custom_tooltip").fadeIn('fast');
        });

        $(".pword").on("focusout", function () {
            $(".custom_tooltip").fadeOut('fast', function () {

                $(".passfail ").html('<span class="fail">Fail</span>');
                $(".checkmark").hide();
            });
        });

        (function ($) {
            $.toggleShowPassword = function (options) {
                var settings = $.extend({
                    field: "#password",
                    control: "#toggle_show_password",
                }, options);

                var control = $(settings.control);
                var field = $(settings.field)

                control.bind('click', function () {
                    if (control.is(':checked')) {
                        field.attr('type', 'text');
                    } else {
                        field.attr('type', 'password');
                    }
                })
            };
        }(jQuery));

        $.toggleShowPassword({
            field: '.pword',
            control: '#showPwordCheck'
        });
        //End Password Checker
        $('#phoneMask').mask('(999) 999-9999');

        imgInp.onchange = evt => {
            $("#blah").css("display", "block");
            const [file] = imgInp.files
            if (file) {
                blah.src = URL.createObjectURL(file)
            }
        }

        $(".selectedRole").change(function () {
            var selValue = $("input[type='radio']:checked").val();
            if (selValue === 'is_manager') {
                $('#secForManager').css('display', 'block')
            } else {
                $('#secForManager').css('display', 'none')
            }
        });

        function allVendorCheck() {
            var val = $('#allVendorChecked').is(':checked');
            if (val) {
                $('#vendorDropDown').css('display', 'none')
                // $('#vendorDropDown').css('display', 'none')
            } else {
                $('#vendorDropDown').css('display', 'block')

            }
        }

        'use strict';
        $('.select2').select2({
            minimumResultsForSearch: Infinity
        });

        function passwordOpen() {
            if ($("#password_open").attr("type") == 'password') {
                $("#password_open").attr('type', 'text');
            } else {
                $("#password_open").attr('type', 'password');
            }
        }

        function rePasswordOpen() {
            if ($("#re_password_open").attr("type") == 'password') {
                $("#re_password_open").attr('type', 'text');
            } else {
                $("#re_password_open").attr('type', 'password');
            }
        }

        // Colored Hover
        // $('#select2').select2({
        //     dropdownCssClass: 'hover-success',
        //     minimumResultsForSearch: Infinity // disabling search
        // });
    </script>
@endpush
