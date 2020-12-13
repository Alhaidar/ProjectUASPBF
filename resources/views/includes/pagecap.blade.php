<div id="header" class="mdk-header bg-dark js-mdk-header m-0" data-fixed>
    <div class="mdk-header__content">
        <div class="navbar navbar-expand-sm navbar-main navbar-dark bg-primary pr-0 pl-md-0 pr-0" id="navbar" data-primary>
            <div class="container-fluid pr-0 ">
                <!-- Navbar toggler -->
                <button class="navbar-toggler navbar-toggler-custom d-lg-none d-flex mr-navbar" type="button" data-toggle="sidebar">
                    <span class="material-icons">short_text</span>
                </button>
                <div class="d-flex sidebar-account flex-shrink-0 mr-auto mr-lg-0">
                    <a href="{{route('front.index')}}" class="flex d-flex align-items-center text-underline-0">
                        <span class="mr-1  text-white">
                            <!-- LOGO -->
                            <img src="{{ asset('image/logo_white_emblem.png') }}" height="40px">
                        </span>
                        <span class="flex d-flex flex-column text-white">
                            <strong class="sidebar-brand">{{config('app.name')}}</strong>
                        </span>
                    </a>
                </div>
                @if (Route::has('login'))
                    @auth
                    <ul class="ml-auto nav navbar-nav mr-2 d-none d-lg-flex">
                        <li class="nav-item"><a href="{{ route('front.dasbor') }}" class="nav-link">Dasbor</a></li>
                    </ul>

                    @else
                        <ul class="ml-auto nav navbar-nav mr-2 d-none d-lg-flex">
                            <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Daftar</a></li>
                        </ul>
                        <div class="dropdown">
                            <a href="{{ route('login') }}" class="navbar-toggler navbar-toggler-dashboard border-left d-flex align-items-center ml-navbar">
                                <span class="ml-1 d-flex-inline">
                                    <span class="text-light">Masuk</span>
                                </span>
                            </a>
                        </div>
                    @endauth
                @endif
            </div>
        </div>
    </div>
</div>
