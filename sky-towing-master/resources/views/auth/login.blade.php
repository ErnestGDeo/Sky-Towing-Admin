<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{ asset('asset-auth/images/icons/favicon.ico') }} "/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('asset-auth/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
          href="{{ asset('asset-auth/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }} ">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('asset-auth/vendor/animate/animate.css') }} ">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('asset-auth/vendor/css-hamburgers/hamburgers.min.css') }} ">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('asset-auth/vendor/select2/select2.min.css') }} ">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('asset-auth/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset-auth/css/main.css') }}">
    <!--===============================================================================================-->

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
{{--    <link rel="stylesheet"--}}
{{--          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"--}}
{{--    />--}}

</head>

<body>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="{{ asset('asset-auth/images/sky-logo.png') }}" alt="IMG">
            </div>

            <form class="login100-form validate-form" method="POST" action="{{ url('/auth/login') }}">
                @csrf
                <span class="login100-form-title">
                        Login Admin
                    </span>

                <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                    <input class="input100" type="text" name="username" placeholder="Username">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Password is required">
                    <input class="input100" type="password" name="password" placeholder="Password">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        Login
                    </button>
                </div>


            </form>
        </div>
    </div>
</div>


@if(session()->has("error"))
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'error',
            title: "{{session()->get('error')}}",
        })
    </script>
@endif


<!--===============================================================================================-->
<script src="{{ asset('asset-auth/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('asset-auth/vendor/bootstrap/js/popper.js') }}"></script>
<script src="{{ asset('asset-auth/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('asset-auth/vendor/select2/select2.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('asset-auth/vendor/tilt/tilt.jquery.min.js') }}"></script>
<script>
    $('.js-tilt').tilt({
        scale: 1.1
    })
</script>
<!--===============================================================================================-->
<script src="{{ asset('asset-auth/js/main.js') }}"></script>

</body>

</html>
