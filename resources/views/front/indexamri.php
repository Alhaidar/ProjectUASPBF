@extends('layouts.front')
@section('title', "Home")

@section('css')
<style media="screen">
  a{
    text-decoration: none !important;
  }
</style>
@endsection

@section('content')
<div class="container page__heading-container">
    <div class="page__heading d-flex align-items-center justify-content-between">
        <h1 class="m-0">Ubah Bidang Lomba</h1>
    </div>
</div>

<div class="container page__container">
    <div class="card card-form">
        <div class="row no-gutters">
            <div class="col-lg-3 card-body">
                <p><strong class="headings-color">Form Ubah Bidang Lomba</strong></p>
                <p class="text-muted">Bidang lomba yang dirubah harus sesuai dengan ketentuan bidang lomba yang tersedia dalam pedoman PKM terbaru.</p>
            </div>
            <div class="col-lg-9 card-form__body card-body">
                <form>
                  <div class="form-group">
                      <label for="">Nama Bidang Lomba</label>
                      <input type="lomba" class="form-control" id="lomba" placeholder="Bidang Lomba">
                  </div>
                  <div class="form-group">
                      <label class="text-label" for="flatpickrSample04">Batas Waktu Lomba</label>
                      <input id="flatpickrSample04" type="hidden" class="form-control flatpickr-input" placeholder="Flatpickr date time example" data-toggle="flatpickr" data-flatpickr-enable-time="true" data-flatpickr-alt-format="F j, Y at H:i" data-flatpickr-date-format="Y-m-d H:i" value="2018-10-07 15:35"><input class="form-control flatpickr-input" placeholder="Flatpickr date time example" tabindex="0" type="text" readonly="readonly">
                  </div>
                </form>
            </div>
        </div>
    </div>
    <div class="text-right mb-5">
      <a href="" class="btn btn-danger">Batal</a>
      <a href="" class="btn btn-warning">Ubah</a>
    </div>
</div>

@endsection

@section('js')
<script src="assets/vendor/flatpickr/flatpickr.min.js"></script>
<script src="assets/js/flatpickr.js"></script>
@endsection
