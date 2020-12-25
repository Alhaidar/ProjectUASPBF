@extends('layouts.base')
@section('title', "Pengumpulan")

@section('css')
@endsection

@section('content')
<div class="container page__heading-container">
    <div class="page__heading d-flex align-items-center justify-content-between">
        <h1 class="m-0">Pengumpulan</h1>
    </div>
</div>

<div class="container page__container">
  <form action="#" class="mb-2">
      <div class="d-flex">
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              @php
                Carbon\Carbon::setLocale('id');
              @endphp
              <strong>{{Auth::user()->nama}},</strong> Batas pengumpulan untuk bidang {{$tim->lomba->nama}} tersisa <span id="timer">waktu</span>.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="form-inline ml-auto">
              <div class="form-group">
                <a href="javascript:void(0)" id="btn_add_submission" class="btn btn-success ml-lg-3">Tambah Pengumpulan <i class="material-icons">add</i></a>
              </div>
            </div>
      </div>
  </form>

  <div class="card card-form" id="add_submission">
      <div class="row no-gutters">
          <div class="col-lg-12 card-form__body card-body">
              <form action="{{route('pengumpulan.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="judul">Judul</label>
                    <input value="{{$tim->judul_proposal}}" id="judul_proposal" class="form-control form-control-prepended" type="text" disabled placeholder="Judul Proposal Lomba">
                </div>
                <div class="form-group">
                    <label for="abstrak">Abstrak</label>
                    <textarea id="abstrak" class="form-control form-control-prepended" disabled>{{$tim->abstrak}}</textarea>
                </div>
                <small>Judul dan abstrak dapat diubah melalui <a href="{{route('akun.index').'#manage-team'}}"> edit tim</a>.</small>
                <hr>
                <div class="form-group">
                    <label for="">Subjek Pengumpulan</label> <small>(Sesuaikan dengan buku pedoman)</small>
                    <input type="text" class="form-control" id="subjek" placeholder="Subjek Pengumpulan" name="subjek" required>
                </div>
                <div class="form-group">
                    <label for="thumbnail">Lampiran File</label><br>
                    <input type="file" name="submisi" id="submission" class="dropzone"/>
                </div>
          </div>
      </div>
      <button type="submit"class="btn btn-success"><i class="fas fa-paper-plane"></i> Kirim</button>
    </form>
  </div>

  <div class="card card-form">
      <div class="row no-gutters">
          <div class="col-lg-3 card-body">
              <p><strong class="headings-color">Pengumpulan</strong></p>
              <p class="text-muted">Dalam mengumpulkan file perlombaan, harap memperhatikan syarat dan ketentuan dalam buku pedoman.</p>
          </div>
          <div class="col-lg-9 card-form__body">
              <div class="table-responsive border-bottom" data-toggle="lists" data-lists-values="[&quot;lists-bidang&quot;]">
                  <div class="search-form search-form--light m-3">
                      <input type="text" class="form-control search" placeholder="Cari nama pengumpulan">
                      <button class="btn" type="button" role="button"><i class="material-icons">search</i></button>
                  </div>
                  <table class="table mb-0 thead-border-top-0">
                      <thead>
                          <tr>
                              <th>Nama Tim</th>
                              <th>Judul Proposal</th>
                              <th style="min-width: 20%;">Subjek</th>
                              <th width="%">File</th>
                          </tr>
                      </thead>
                      <tbody class="list" id="staff02">
                        @forelse($pengumpulan as $p)
                        <tr>
                            <td>
                              <strong>{{ $p->tim->lomba->nama }}</strong>
                              <p>{{ $p->tim->user->nama }}</p>
                            </td>
                            <td>{{ $p->tim->judul_proposal }}</td>
                            <td>{{ $p->subjek }}</td>
                            <td><a href="{{asset($p->file)}}" target="_blank" class="btn btn-info"><i class="fas fa-cloud-download-alt"></i> Unduh</a>
                                <a href="{{route('pengumpulan.batal', $p->id)}}" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Batal</a>
                            </td>
                        </tr>
                        @empty
                          <td colspan="4">
                              <h6 style="margin:20px auto 40px auto;text-align:center">Pengumpulan Berkas belum dilakukan, lakukan pengumpulan berkas terlebih dahulu.</h6>
                          </td>
                        @endforelse
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection

@section('js')
<script type="text/javascript">
$(document).ready(function(){
     $("#add_submission").hide();
     $('#btn_add_submission').click(function(){
         $("#add_submission").slideToggle();
     });
});

// Set the date we're counting down to
    var d = new Date("{{ $tim->lomba->batas_waktu }}");
    var countDownDate = new Date(d).getTime();
    // Update the count down every 1 second
    var x = setInterval(function () {
        // Get todays date and time
        var now = new Date().getTime();
        // Find the distance between now and the count down date
        var distance = countDownDate - now;
        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        // Output the result in an element with id="demo"
        document.getElementById("timer").innerHTML = "<b>" + days + "</b> Hari : <b>" + hours + "</b> Jam : <b>" +
            minutes + "</b> Menit : <b>" + seconds + "</b> Detik ";
        // If the count down is over, write some text
        if (distance < 0) {
            clearInterval(x);
            $('#timer').text("Waktu Habis");
        }
    }, 1000);
</script>
@endsection
