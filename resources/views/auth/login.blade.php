<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Masuk | {{config('app.name')}}</title>
    @include('includes.favicon')
    <!-- Prevent the demo from appearing in search engines -->
    <meta name="robots" content="noindex">
    <!-- Perfect Scrollbar -->
    <link type="text/css" href="{{ asset('template/vendor/perfect-scrollbar.css') }}" rel="stylesheet">
    <!-- App CSS -->
    <link type="text/css" href="{{ asset('template/css/app.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('template/css/app.rtl.css') }}" rel="stylesheet">
    <!-- Material Design Icons -->
    <link type="text/css" href="{{ asset('template/css/vendor-material-icons.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('template/css/vendor-material-icons.rtl.css') }}" rel="stylesheet">
    <!-- Font Awesome FREE Icons -->
    <link type="text/css" href="{{ asset('template/css/vendor-fontawesome-free.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('template/css/vendor-fontawesome-free.rtl.css') }}" rel="stylesheet">
    <!-- ion Range Slider -->
    <link type="text/css" href="{{ asset('template/css/vendor-ion-rangeslider.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('template/css/vendor-ion-rangeslider.rtl.css') }}" rel="stylesheet">
</head>

<body class="layout-login-centered-boxed">
    <div class="layout-login-centered-boxed__form">
        <div class="d-flex flex-column justify-content-center align-items-center mt-2 mb-4 navbar-light">
            <a href="{{ route('front.index') }}" class="text-center text-light-gray mb-4">
                <!-- LOGO -->
                <img src="{{ asset('image/logo_full.png') }}" height="80px">
            </a>
        </div>
        <div class="card card-body">
            <!-- <div class="alert alert-soft-success d-flex" role="alert">
                <i class="material-icons mr-3">check_circle</i>
                <div class="text-body">An email with password reset instructions has been sent to your email address, if it exists on our system.</div>
            </div> -->
            <div class="page-separator">
                <div class="page-separator__text"><a href="{{ route('front.index') }}" style="text-decoration:none">< Kembali</a> </div>
            </div>

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label class="text-label" for="email_2">Alamat Surel:</label>
                    <div class="input-group input-group-merge">
                        <input id="email" type="email" name="email" class="form-control form-control-prepended @error('email') is-invalid @enderror" placeholder="fulan@mail.id" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <span class="far fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="text-label" for="password_2">Kata Sandi:</label>
                    <div class="input-group input-group-merge">
                        <input id="password" type="password" class="form-control form-control-prepended @error('password') is-invalid @enderror" placeholder="Tuliskan kata sandi" name="password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <span class="fa fa-key"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group mb-1">
                    <button class="btn btn-block btn-primary" type="submit">{{ __('Login') }}</button>
                </div>
                <div class="form-group text-center mb-0">
                    Belum punya akun? <a class="text-underline" href="{{ route('register') }}" style="text-decoration:none">Daftar</a>
                </div>
            </form>
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('template/vendor/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('template/vendor/popper.min.js') }}"></script>
    <script src="{{ asset('template/vendor/bootstrap.min.js') }}"></script>
    <!-- Perfect Scrollbar -->
    <script src="{{ asset('template/vendor/perfect-scrollbar.min.js') }}"></script>
    <!-- DOM Factory -->
    <script src="{{ asset('template/vendor/dom-factory.js') }}"></script>
    <!-- MDK -->
    <script src="{{ asset('template/vendor/material-design-kit.js') }}"></script>
    <!-- Range Slider -->
    <script src="{{ asset('template/vendor/ion.rangeSlider.min.js') }}"></script>
    <script src="{{ asset('template/js/ion-rangeslider.js') }}"></script>
    <!-- App -->
    <script src="{{ asset('template/js/toggle-check-all.js') }}"></script>
    <script src="{{ asset('template/js/check-selected-row.js') }}"></script>
    <script src="{{ asset('template/js/dropdown.js') }}"></script>
    <script src="{{ asset('template/js/sidebar-mini.js') }}"></script>
    <script src="{{ asset('template/js/app.js') }}"></script>

</body>

</html>
