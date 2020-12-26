@extends('layouts.base')
@section('title', "Ubah Pengumuman")

@section('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
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
                <form action="{{route('pengumuman.update',$pengumuman->id)}}" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="form-group{{ $errors->has('judul') ? ' has-error' : '' }}">
                      <label for="">Judul Pengumuman</label>
                      <input type="lomba" class="form-control" id="judul" placeholder="Judul" name="judul" value="{{$pengumuman->judul}}" required>
                  </div>
                  <div class="form-group{{ $errors->has('konten') ? ' has-error' : '' }}">
                      <label for="">Konten</label>
                      <textarea class="form-control" id="summernote" class="form-control summernote" name="konten" rows="3" required> {{$pengumuman->konten}} </textarea>
                  </div>
                  <div class="form-group">
                      <label for="thumbnail">Gambar Sampul</label><br>
                      <input type="file" name="thumbnail" id="tumbnail" class="dropzone"/>
                  </div>
            </div>
        </div>
        <button type="submit"class="btn btn-success">Simpan</button>
      </form>
    </div>
</div>
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
  $('#summernote').summernote({
    placeholder: 'Isi Pengumuman',
    tabsize: 2,
    height: 120,
    toolbar: [
      ['font', ['bold', 'underline', 'clear']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['insert', ['link', 'picture']],
      ['view', ['fullscreen', 'codeview']]
    ]
  });
</script>
<script type="text/javascript">
  $(".note-editable").css("background-color","white");
</script>
@endsection
