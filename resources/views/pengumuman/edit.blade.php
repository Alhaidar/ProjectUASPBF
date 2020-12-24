@extends('layouts.base')
@section('title', "Ubah Pengumuman")
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
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

<script>
$('#summernote').summernote({
    tabsize: 2,
    height: 200,
    toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'underline', 'clear']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'video']],
        ['view', ['fullscreen', 'codeview', 'help']]
    ]});
</script>
@endsection

@section('js')
@endsection
