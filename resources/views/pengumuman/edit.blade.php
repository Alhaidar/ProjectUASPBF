@extends('layouts.base')
@section('title', "Ubah Pengumuman")

@section('css')
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
                <form action="{{route('pengumuman.update',$pengumuman->id)}}" method="post">
                  {{ csrf_field() }}
                  <div class="form-group">
                      <label for="">Judul Pengumuman</label>
                      <input type="lomba" class="form-control" id="judul" placeholder="Judul" name="judul" value="{{$pengumuman->judul}}">
                  </div>
                  <div class="form-group">
                      <label for="">Konten</label>
                      <input type="text" class="form-control" id="konten" placeholder="Isi Konten" name="konten" value="{{$pengumuman->konten}}">
                  </div>
                  <div class="form-group">
                      <label for="">Thumbnail</label>
                      <input type="text" class="form-control" id="tumbnail" placeholder="Thumbnail" name="thumbnail" value="{{$pengumuman->thumbnail}}">
                  </div>
            </div>
        </div>
    </div>
    <div class="text-right mb-5">
      <a href="{{route('pengumuman.index')}}" class="btn btn-danger">Batal</a>
      <button type="submit"class="btn btn-primary">Submit</button>
    </div>
    </form>
</div>
@endsection

@section('js')
@endsection
