@extends('layouts.base')
@section('title', "Tambah Pengumpulan")

@section('css')
@endsection

@section('content')
<div class="container page__heading-container">
    <div class="page__heading d-flex align-items-center justify-content-between">
        <h1 class="m-0">Tambah Pengumpulan</h1>
    </div>
</div>

<div class="container page__container">
    <div class="mb-2">
      <a href="{{route('pengumpulan.index')}}" class="btn btn-light"><i class="fas fa-chevron-left"></i> Batal</a>
    </div>
    <div class="card card-form">
        <div class="row no-gutters">
            <div class="col-lg-12 card-form__body card-body">
                <form action="{{route('pengumpulan.store')}}" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="form-group">
                      <label for="">Judul Proposal</label>
                      <input type="lomba" class="form-control" id="judul" placeholder="Judul Proposal" name="judul" disabled required>
                  </div>
                  <div class="form-group">
                      <label for="">Subjek Pengumpulan</label>
                      <input type="lomba" class="form-control" id="subjek" placeholder="Subjek Pengumpulan" name="subjek" required>
                  </div>
                  <div class="form-group">
                      <label for="thumbnail">Lampiran File</label><br>
                      <input type="file" name="submission" id="submission" class="dropzone"/>
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
