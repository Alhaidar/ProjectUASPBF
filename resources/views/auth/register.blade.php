<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Pendaftaran | {{config('app.name')}}</title>
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
    <link href="https://cdn.jsdelivr.net/npm/smartwizard@5/dist/css/smart_wizard_all.min.css" rel="stylesheet" type="text/css" />
</head>

<?php
$fakultas = \App\Fakultas::all();
$lomba = \App\Lomba::all();
 ?>
<body class="layout-login-centered-boxed">
    <div class="layout-login-centered-boxed__form" style="width:1200px;max-width:none">
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

            <form method="POST" action="{{ route('register') }}">
                @csrf
            <div id="smartwizard" class="sw sw-justified sw-theme-dots">
                    <ul class="nav">
                        <li class="nav-item">
                          <a class="nav-link inactive done" href="#step-1">
                            <strong>Tahap 1</strong> <br>Akun
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link inactive active" href="#step-2">
                            <strong>Tahap 2</strong> <br>Perlombaan
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link inactive done" href="#step-3">
                            <strong>Tahap 3</strong> <br>Tim
                          </a>
                        </li>
                    </ul>
                      <div class="tab-content" style="height: 205.438px;">
                        <div id="step-1" class="tab-pane" role="tabpanel" aria-labelledby="step-1" style="position: static; left: auto; max-width: 1040px; top: auto; display: none;">
                            <div class="form-group">
                                <label class="text-label" for="email">Alamat Surel:</label>
                                <div class="input-group input-group-merge">
                                    <input id="email" type="email" name="email[]" class="form-control form-control-prepended @error('email') is-invalid @enderror" placeholder="fulan@mail.id" value="{{ old('email') }}" required autocomplete="email">
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

                        </div>
                        <div id="step-2" class="tab-pane" role="tabpanel" aria-labelledby="step-2" style="position: static; left: auto; max-width: 1040px; top: auto;">
                            <div class="form-group">
                                <label class="text-label" for="lomba">Lomba:</label>
                                <div class="input-group input-group-merge">
                                    <select id="lomba" class="form-control form-control-prepended" name="id_lomba" required>
                                      <option value="0" selected disabled>Pilih Bidang Lomba:</option>
                                      @foreach ($lomba as $key => $value)
                                        <option value="{{$value->id}}">{{$value->nama}}</option>
                                      @endforeach
                                    </select>
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <span class="far fa-compass"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="text-label" for="judul_proposal">Judul: <small>(Tidak Wajib)</small> </label>
                                <div class="input-group input-group-merge">
                                    <input id="judul_proposal" class="form-control form-control-prepended" type="text" name="judul_proposal" placeholder="Judul Proposal Lomba">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <span class="fas fa-heading"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="text-label" for="abstrak">Abstrak: <small>(Tidak Wajib)</small> </label>
                                <div class="input-group input-group-merge">
                                    <textarea id="abstrak" class="form-control form-control-prepended" name="abstrak"></textarea>
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <span class="fas fa-align-justify"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="text-label" for="dospem">Dosen Pembimbing:</label>
                                <div class="input-group input-group-merge">
                                    <input id="dospem" class="form-control form-control-prepended" type="text" name="dosen_pembimbing" required placeholder="Nama Lengkap Dosen Pembimbing">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <span class="fas fa-chalkboard-teacher"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="text-label" for="nidn">Nomer Induk Dosen:</label>
                                <div class="input-group input-group-merge">
                                    <input id="nidn" class="form-control form-control-prepended" type="number" name="nomor_induk_dosen" required placeholder="NIDN Dosen Pembimbing">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <span class="fas fa-list-ol"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="step-3" class="tab-pane" role="tabpanel" aria-labelledby="step-3" style="position: static; left: auto; max-width: 1040px; display: none;">
                            <div class="page-separator">
                              <div class="page-separator__text">Ketua</div>
                            </div>
                            <div class="form-group">
                                <label class="text-label" for="nama">Nama Ketua:</label>
                                <div class="input-group input-group-merge">
                                    <input id="nama" type="text" name="nama[]" class="form-control form-control-prepended" placeholder="Nama Lengkap" value="{{ old('nama') }}" required autofocus>
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <span class="far fa-user"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="text-label" for="telp">Nomor Telepon Ketua:</label>
                                <div class="input-group input-group-merge">
                                    <input id="telp" type="text" name="no_telp[]" class="form-control form-control-prepended" placeholder="Nomor Telepon Ketua" value="{{ old('no_telp') }}" required autofocus>
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <span class="fas fa-phone"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="text-label" for="faculty">Fakultas Ketua:</label>
                                <div class="input-group input-group-merge">
                                    <select id="faculty" class="form-control form-control-prepended" name="fakultas[]" required>
                                      <option value="0" selected disabled>Pilih Fakultas:</option>
                                      @foreach ($fakultas as $key => $value)
                                        <option value="{{$value->id}}">{{$value->nama}}</option>
                                      @endforeach
                                    </select>
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <span class="fas fa-school"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="page-separator">
                              <div class="page-separator__text">Anggota 1</div>
                            </div>
                            <div class="form-group">
                                <label class="text-label" for="nama">Nama Anggota 1:</label>
                                <div class="input-group input-group-merge">
                                    <input id="nama" type="text" name="nama[]" class="form-control form-control-prepended" placeholder="Nama Lengkap" required autofocus>
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <span class="far fa-user"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="text-label" for="telp">Nomor Telepon Anggota 1:</label>
                                <div class="input-group input-group-merge">
                                    <input id="telp" type="text" name="no_telp[]" class="form-control form-control-prepended" placeholder="Nomor Telepon Anggota 1" required autofocus>
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <span class="fas fa-phone"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="text-label" for="email_2">Alamat Surel Anggota 1:</label>
                                <div class="input-group input-group-merge">
                                    <input id="email" type="email" name="email" class="form-control form-control-prepended" placeholder="fulan@mail.id" required autocomplete="email">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <span class="far fa-envelope"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="text-label" for="faculty">Fakultas Anggota 1:</label>
                                <div class="input-group input-group-merge">
                                    <select id="faculty" class="form-control form-control-prepended" name="fakultas[]" required>
                                      <option value="0" selected disabled>Pilih Fakultas:</option>
                                      @foreach ($fakultas as $key => $value)
                                        <option value="{{$value->id}}">{{$value->nama}}</option>
                                      @endforeach
                                    </select>
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <span class="fas fa-school"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="page-separator">
                              <div class="page-separator__text">Anggota 2</div>
                            </div>
                            <div class="form-group">
                                <label class="text-label" for="nama">Nama Anggota 2: <small>(Tidak Wajib)</small></label>
                                <div class="input-group input-group-merge">
                                    <input id="nama" type="text" name="nama[]" class="form-control form-control-prepended" placeholder="Nama Lengkap" autofocus>
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <span class="far fa-user"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="text-label" for="telp">Nomor Telepon Anggota 2: <small>(Tidak Wajib)</small></label>
                                <div class="input-group input-group-merge">
                                    <input id="telp" type="text" name="no_telp[]" class="form-control form-control-prepended" placeholder="Nomor Telepon Anggota 2" autofocus>
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <span class="fas fa-phone"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="text-label" for="email_2">Alamat Surel Anggota 2: <small>(Tidak Wajib)</small></label>
                                <div class="input-group input-group-merge">
                                    <input id="email" type="email" name="email" class="form-control form-control-prepended" placeholder="fulan@mail.id" autocomplete="email">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <span class="far fa-envelope"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="text-label" for="faculty">Fakultas Anggota 2: <small>(Tidak Wajib)</small></label>
                                <div class="input-group input-group-merge">
                                    <select id="faculty" class="form-control form-control-prepended" name="fakultas[]">
                                      <option value="0" selected disabled>Pilih Fakultas:</option>
                                      @foreach ($fakultas as $key => $value)
                                        <option value="{{$value->id}}">{{$value->nama}}</option>
                                      @endforeach
                                    </select>
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <span class="fas fa-school"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><div class="toolbar toolbar-bottom" role="toolbar" style="text-align: right;"><button class="btn sw-btn-prev" type="button">Kembali</button><button class="btn sw-btn-next" type="button">Berikutnya</button>
                      <button class="btn btn-success" type="submit">Daftar</button></div>
                </div>
                </form>
                <div class="form-group text-center mb-0 mt-2">
                    Sudah punya akun? <a class="text-underline" href="{{ route('login') }}" style="text-decoration:none">Masuk</a>
                </div>
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
    <script src="https://cdn.jsdelivr.net/npm/smartwizard@5/dist/js/jquery.smartWizard.min.js" type="text/javascript"></script>
    <script type="text/javascript">
    $(document).ready(function(){
      $('#smartwizard').smartWizard();
    });
    </script>
</body>

</html>
