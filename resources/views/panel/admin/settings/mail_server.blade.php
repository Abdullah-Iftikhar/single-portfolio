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
    </style>
@endpush

@section('title')
    Settings
@endsection

@section('page_title')
    {{isset($user)?"Edit Mail Server":"Add Mail Server"}}
@endsection

@section('body')
    <?PHP
        $smtp_server_username = App\Http\Controllers\Admin\SettingController::simpleEncrypt($settings['smtp_server_username'], 'd');
        $smtp_server_password = App\Http\Controllers\Admin\SettingController::simpleEncrypt($settings['smtp_server_password'], 'd');
        $mailgun_secret = App\Http\Controllers\Admin\SettingController::simpleEncrypt($settings['mailgun_secret'], 'd');
        $mandrill_secret = App\Http\Controllers\Admin\SettingController::simpleEncrypt($settings['mandrill_secret'], 'd');
        $ses_key = App\Http\Controllers\Admin\SettingController::simpleEncrypt($settings['ses_key'], 'd');
        $ses_secret = App\Http\Controllers\Admin\SettingController::simpleEncrypt($settings['ses_secret'], 'd');
        $sparkpost_secret = App\Http\Controllers\Admin\SettingController::simpleEncrypt($settings['sparkpost_secret'], 'd');
    ?>
    {{--Start Content--}}
    <div class="section-wrapper">
        <div class="mg-t-40">
            <form method="post" action="{{route('admin.vendor.save.settings')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-layout form-layout-4">
                    <div class="row">
                        <label class="col-lg-4 form-control-label">Mail Driver:</label>
                        <div class="col-lg-4">
                            <select name="mail_driver" id="mail_driver" onChange="mail_driver_change()"
                                    class="form-control ">
                                <option value="smtp" {{($settings['mail_driver'] =='smtp')?'selected':''}}>
                                    SMTP
                                </option>
                                <option value="mail" {{($settings['mail_driver'] =='mail')?'selected':''}}>
                                    Mail
                                </option>
                                <option
                                    value="sendmail" {{($settings['mail_driver'] =='sendmail')?'selected':''}}>
                                    Send mail
                                </option>
                                <option
                                    value="mailgun" {{($settings['mail_driver'] =='mailgun')?'selected':''}}>
                                    Mailgun
                                </option>
                                <option
                                    value="mandrill" {{($settings['mail_driver'] =='mandrill')?'selected':''}}>
                                    Mandrill
                                </option>
                                <option value="ses" {{($settings['mail_driver'] =='ses')?'selected':''}}>SES
                                </option>
                                <option
                                    value="sparkpost" {{($settings['mail_driver'] =='sparkpost')?'selected':''}}>
                                    Sparkpost
                                </option>
                            </select>
                        </div>
                    </div><!-- row -->
                    <div class="row mg-t-20">
                        <label class="col-lg-4 form-control-label">Host Address:</label>
                        <div class="col-lg-4">
                            <input type="text" name="smtp_host_address" class="form-control "
                                   value="{{$settings['smtp_host_address']}}">
                        </div>
                    </div>
                    <div class="row mg-t-20">
                        <label class="col-lg-4 form-control-label">Host Port:</label>
                        <div class="col-lg-4">
                            <input type="text" name="smtp_host_port" class="form-control "
                                   value="{{$settings['smtp_host_port']}}">
                        </div>
                    </div>
                    <div class="row mg-t-20">
                        <label class="col-lg-4 form-control-label">E-Mail Encryption Protocol:</label>
                        <div class="col-lg-4">
                            <input type="text" name="mail_encryption_protocol" class="form-control "
                                   value="{{$settings['mail_encryption_protocol']}}">
                        </div>
                    </div>

                    <div class="row mg-t-20">
                        <label class="col-lg-4 form-control-label">Username:</label>
                        <div class="col-lg-4">
                            <input type="text" name="smtp_server_username" class="form-control "
                                   value="{{$smtp_server_username}}">
                        </div>
                    </div>

                    <div class="row mg-t-20">
                        <label class="col-lg-4 form-control-label">Password:</label>
                        <div class="col-lg-4">
                            <input type="text" name="smtp_server_password" class="form-control "
                                   value="{{$smtp_server_password}}">
                        </div>
                    </div>


                    <div class="row mg-t-20 mailserver_mailgun">
                        <label class="col-lg-4 form-control-label">Mailgun Domain:</label>
                        <div class="col-lg-4">
                            <input type="text" name="mailgun_domain" class="form-control"
                                   value="{{$settings['mailgun_domain']}}">
                        </div>
                    </div>
                    <div class="row mg-t-20 mailserver_mailgun">
                        <label class="col-lg-4 form-control-label">Mailgun Secret:</label>
                        <div class="col-lg-4">
                            <input type="text" name="mailgun_secret" class="form-control "
                                   value="{{$mailgun_secret}}">
                        </div>
                    </div>


                    <div class="row mg-t-20 mailserver_mandrill">
                        <label class="col-lg-4 form-control-label">Mandrill Secret:</label>
                        <div class="col-lg-4">
                            <input type="text" name="mandrill_secret" class="form-control "
                                   value="{{$mandrill_secret}}">
                        </div>
                    </div>

                    <div class="row mg-t-20 mailserver_ses">
                        <label class="col-lg-4 form-control-label">SES Key:</label>
                        <div class="col-lg-4">
                            <input type="text" name="ses_key" class="form-control " value="{{$ses_key}}">
                        </div>
                    </div>

                    <div class="row mg-t-20 mailserver_ses">
                        <label class="col-lg-4 form-control-label">SES Secret:</label>
                        <div class="col-lg-4">
                            <input type="text" name="ses_secret" class="form-control " value="{{$ses_secret}}">
                        </div>
                    </div>

                    <div class="row mg-t-20 mailserver_sparkpost">
                        <label class="col-lg-4 form-control-label">Sparkpost Secret:</label>
                        <div class="col-lg-4">
                            <input type="text" name="sparkpost_secret" class="form-control "
                                   value="{{$sparkpost_secret}}">
                        </div>
                    </div>


                    <div class="row mg-t-20">
                        <div class="col-lg-4">&nbsp;</div>
                        <div class="col-lg-4">
                            <button type="submit" class="btn btn-primary "><i class="fa fa-save"></i> Save</button>

                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
    {{--End Content--}}
@endsection

@push('script-section')
    <script>
        $(function () {
            mail_driver_change();
        });

        function mail_driver_change() {
            mail_driver = $("#mail_driver").val();
            $(".mailserver_mailgun").hide();
            $(".mailserver_mandrill").hide();
            $(".mailserver_ses").hide();
            $(".mailserver_sparkpost").hide();
            $(".mailserver_" + mail_driver).show();
        }
    </script>
@endpush
