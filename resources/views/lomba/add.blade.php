@extends('layouts.base')
@section('title', "Tambah Lomba")

@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection

@section('content')
<div class="container page__heading-container">
    <div class="page__heading d-flex align-items-center justify-content-between">
        <h1 class="m-0">Tambah Bidang Lomba</h1>
    </div>
</div>

<div class="container page__container">
    <div class="card card-form">
        <div class="row no-gutters">
            <div class="col-lg-3 card-body">
                <p><strong class="headings-color">Form Tambah Bidang Lomba</strong></p>
                <p class="text-muted">Bidang lomba yang ditambahkan harus sesuai dengan ketentuan bidang lomba yang tersedia dalam pedoman PKM terbaru.</p>
            </div>
            <div class="col-lg-9 card-form__body card-body">
                <form action="{{route('lomba.store')}}" method="post">
                  {{ csrf_field() }}
                  <div class="form-group">
                      <label for="">Nama Bidang Lomba</label>
                      <input type="lomba" class="form-control" id="lomba" placeholder="Bidang Lomba" name="bidang_lomba">
                  </div>
                  <div class="form-group">
                      <label for="">Batas Waktu Lomba</label>
                      <input type="datetime-local" class="form-control" id="waktu_lomba" name="waktu_lomba">
                  </div>
            </div>
        </div>
    </div>
    <div class="text-right mb-5">
      <a href="/lomba" class="btn btn-danger">Batal</a>
      <button type="submit"class="btn btn-primary">Tambah</button>
    </div>
    </form>
</div>
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
@endsection
