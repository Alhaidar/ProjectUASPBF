@extends('layouts.base')
@section('title', "Tambah Pengumuman")

@section('css')
<link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<link href="//cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet">

@endsection

@section('content')
<div class="container page__heading-container">
    <div class="page__heading d-flex align-items-center justify-content-between">
        <h1 class="m-0">Tambah Pengumuman</h1>
    </div>
</div>

<div class="container page__container">
    <div class="card card-form">
        <div class="row no-gutters">
            <div class="col-lg-12 card-form__body card-body">
                <form>
                  <div class="form-group">
                      <label for="">Judul Pengumuman</label>
                      <input type="lomba" class="form-control" id="judul" placeholder="Judul">
                  </div>
                  <div class="form-group">
                      <label for="">Konten</label>
                      <input type="text" class="form-control" id="konten" placeholder="Isi Konten">
                  </div>
                  <div class="form-group">
                      <label for="">Thumbnail</label>
                      <input type="text" class="form-control" id="tumbnail" placeholder="Thumbnail">
                  </div>
                </form>
            </div>
        </div>
    </div>
    <div class="text-right mb-5">
      <a href="" class="btn btn-danger">Batal</a>
      <a href="" class="btn btn-primary">Tambah</a>
    </div>
</div>


@endsection

@section('js')
<script src="//cdn.quilljs.com/1.3.6/quill.js"></script>
<script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>

@endsection
