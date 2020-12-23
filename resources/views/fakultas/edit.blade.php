@extends('layouts.base')
@section('title', "Ubah Fakultas")

@section('css')
@endsection

@section('content')
<div class="container page__heading-container">
    <div class="page__heading d-flex align-items-center justify-content-between">
        <h1 class="m-0">Ubah Fakultas</h1>
    </div>
</div>

<div class="container page__container">
    <div class="card card-form">
        <div class="row no-gutters">
            <div class="col-lg-3 card-body">
                <p><strong class="headings-color">Form Ubah Fakultas</strong></p>
                <p class="text-muted">Fakultas yang ditambahkan harus berasal dari Universitas Jember dan mengikuti kegiatan PKM Raya.</p>
            </div>
            <div class="col-lg-9 card-form__body card-body">
                <form action="{{route('fakultas.update',$fakultas->id)}}" method="post">
                  {{ csrf_field() }}
                  <div class="form-group">
                      <label for="">Nama Fakultas</label>
                      <input type="lomba" class="form-control" id="fakultas" placeholder="Nama Fakultas" value="{{$fakultas->nama}}" name="nama">
                  </div>
                  <a href="/fakultas" class="btn btn-danger">Batal</a>
                  <button type="submit"class="btn btn-primary">Ubah</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
@endsection
