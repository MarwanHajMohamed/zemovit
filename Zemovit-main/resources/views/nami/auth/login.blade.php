<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$settings->website_name ??  'Nami'}} | {{__("auth.login")}}</title>
    <link rel="stylesheet" href="{{asset('admin/login')}}/css/style.css">
    <link rel="stylesheet" href="{{asset('admin/login')}}/css/fontawesome.min.css">
    <link rel="stylesheet" href="{{asset('admin')}}/assets/vendor/toster/css/jquery.toast.css">
</head>

<body @if(app()->getLocale()=='ar') dir="rtl" @endif>
<div class="container">
    <div class="side">
        <div class="inner">
            <div class="form-wrap">
                @if(isset($settings))
                    <img class="logo" style="object-fit: contain ;height: 100px"
                         src="{{showFile($settings->logo_header)}}" alt="">
                @else
                    <img class="logo" style="object-fit: contain ;height: 100px "
                         src="{{asset('admin/login')}}/imgs/Frame 36125.svg"
                         alt="">
                @endif
                <h1>{{__('auth.welcomeback')}} 👋</h1>
                <!-- <p>Glad to see you again</p> -->
                <form id="loginForm" action="{{ route('admin.login') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <div class="input-field">
                            <label for="email"><img src="{{asset('admin/login')}}/imgs/email.svg"
                                                    alt="email"> {{__('auth.email')}}*</label>
                            <input type="email" id="email" name="login" placeholder="{{__('auth.placeholderEmail')}}">
                        </div>
                        <div class="input-field">
                            <label for="password"><img src="{{asset('admin/login')}}/imgs/password.svg"
                                                       alt="password"> {{__('auth.password')}}*</label>
                            <input type="password" id="password" name="password"
                                   placeholder="•••••••••••••••••••••••">
                        </div>
                        <div class="check-field check">
                            <div>
                                <input type="checkbox" name="rememberme" id="rememberme">
                                <label for="rememberme">{{__('auth.rememberme')}}</label>
                            </div>
                            <!-- <a href="">Forgot your password?</a> -->
                        </div>
                    </div>
                    <button type="submit">{{__('auth.sign in')}}</button>
                </form>
            </div>
        </div>
        <p class="footer">
            {{ $main_setting->copyright_text ?? __('auth.All Rights Reserved.') }}
            <a href="{{$main_setting->copyright_link ?? ''}}" target="_blank" title="ROMOZ" class="namiFotter">
                <img src="{{showFile( $main_setting->footer_logo ?? '')}}" width="50px" alt="">
            </a>
            © {{date('Y')}}
        </p>
    </div>

    <div class="animation">
        <!-- orbit canvas -->
        <div id="globe">
            <canvas></canvas>
        </div>
    </div>
</div>
<!-- orbit -->
<script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>
<script>
    $(function () {
        $('#password').password()
    })
</script>
<script src="{{asset('admin')}}/assets/js/plugins.js"></script>
<script src="{{asset('admin')}}/assets/js/theme.js"></script>
<script src="{{asset('admin')}}/assets/vendor/toster/js/jquery.toast.js"></script>
<script src="{{asset('admin')}}/assets/js/custom.js"></script>
<script src="{{asset('admin/login')}}/js/three.js"></script>
<script src="{{asset('admin/login')}}/js/orbit.js"></script>
<script src="{{asset('admin/login')}}/js/custom_orbit.js"></script>
<script type="text/javascript">
    $(function () {

        console.clear()
        /*------------------------------------------
        --------------------------------------------
        Submit Event
        --------------------------------------------
        --------------------------------------------*/
        $(document).on("submit", "#loginForm", function (e) {
            e.preventDefault();
            let formObj = $(this);
            formObj.find("[type='submit']").html("{{__('auth.sign in')}}...");
            $.ajax({
                url: formObj.attr('action'),
                data: formObj.serialize(),
                type: "POST",
                dataType: 'json',
                success: function (result) {
                    console.log("success =  200")
                    formObj.find("[type='submit']").html("{{__('auth.sign in')}}");
                    if (result.code === 200) {
                        successToster('{{__("auth.done successfully")}}', result.message);
                        // console.log(result.data.url)
                        window.location.href = result.data.url;
                    } else if (result.code === 401) {
                        warningToster('{{__("auth.an error occurred")}}', result.message)
                    } else {
                        warningToster('{{__("auth.an error occurred")}}', result.message)
                    }
                },
                error: function (errorObj, errorText, errorThrown) {
                    console.log("error =  500")
                    formObj.find("[type='submit']").html("{{__('auth.sign in')}}");
                    if (errorObj.status === 500) {
                        errorToster('{{__("auth.an error occurred")}}', "{{__("auth.code error")}}");
                    } else if (errorObj.status == 422) {
                        let errorsObj = $.parseJSON(errorObj.responseText);
                        let listObject = errorsObj.errors;
                        let testArr = [];
                        $.each(listObject, function (errorKey, errorArr) {
                            $.each(errorArr, function (key, value) {
                                testArr.push(value);
                            });
                        });
                        // console.log(testArr)
                        validToster('{{__("auth.an error occurred")}}', testArr)
                    }

                }
            });
            return false;
        });

    });
</script>
</body>

</html>
