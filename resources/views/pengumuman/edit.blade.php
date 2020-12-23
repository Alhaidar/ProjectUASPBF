@extends('layouts.base')
@section('title', "Ubah Pengumuman")

@section('css')
@endsection

@section('content')
<div class="container page__heading-container">
    <div class="page__heading d-flex align-items-center justify-content-between">
        <h1 class="m-0">Ubah Pengumuman</h1>
    </div>
</div>

<div class="container page__container">
    <div class="mb-2">
      <a href="{{route('pengumuman.index')}}" class="btn btn-light"><i class="fas fa-chevron-left"></i> Batal</a>
    </div>
    <div class="card card-form">
        <div class="row no-gutters">
            <div class="col-lg-12 card-form__body card-body">
                <form action="{{route('pengumuman.update',$pengumuman->id)}}" method="post">
                  {{ csrf_field() }}
                  <div class="form-group">
                      <label for="">Judul Pengumuman</label>
                      <input type="lomba" class="form-control" id="judul" placeholder="Judul" name="judul" value="{{$pengumuman->judul}}">
                  </div>
                  <div class="form-group">
                      <label for="">Konten</label>
                      <textarea class="form-control" data-toggle="quill" data-quill-placeholder="Konten isi pengumuman" name="konten" id="konten" rows="3">{{$pengumuman->konten}}</textarea>
                  </div>
                  <div class="form-group">
                        <label for="thumbnail">Gambar Sampul</label><br>
                      <input type="file" name="thumbnail" id="tumbnail" class="dropzone" data-default-file="{{asset($pengumuman->thumbnail)}}"/>
                  </div>
            </div>
        </div>
        <button type="submit"class="btn btn-success">Simpan</button>
      </form>
    </div>
</div>
@endsection

@section('js')
@endsection
