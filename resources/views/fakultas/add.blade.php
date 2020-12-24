@extends('layouts.base')
@section('title', "Tambah Fakultas")

@section('css')
@endsection

@section('content')
<div class="container page__heading-container">
    <div class="page__heading d-flex align-items-center justify-content-between">
        <h1 class="m-0">Tambah Fakultas</h1>
    </div>
</div>

<div class="container page__container">
    <div class="mb-2">
      <a href="{{route('fakultas.index')}}" class="btn btn-light"><i class="fas fa-chevron-left"></i> Batal</a>
    </div>
    <div class="card card-form">
        <div class="row no-gutters">
            <div class="col-lg-3 card-body">
                <p><strong class="headings-color">Form Tambah Fakultas</strong></p>
                <p class="text-muted">Fakultas yang ditambahkan harus berasal dari Universitas Jember dan mengikuti kegiatan PKM Raya.</p>
            </div>
            <div class="col-lg-9 card-form__body card-body">
                <form action="{{route('fakultas.store')}}" method="post">
                  {{ csrf_field() }}
                  <div class="form-group {{ $errors->has('fakultas') ? ' has-error' : '' }}">
                      <label for="">Nama Fakultas</label>
                      <input type="lomba" class="form-control" id="fakultas" placeholder="Nama Fakultas" name="fakultas">
                  </div>
            </div>
      </div>
        <button type="submit"class="btn btn-success">Tambah</button>
      </form>
    </div>
</div>
@endsection

@section('js')
@endsection
