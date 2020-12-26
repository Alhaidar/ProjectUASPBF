@extends('layouts.base')
@section('title', "Submisi")

@section('css')
<style media="screen">
  .bg-lighter{
    /* display: none; */
    background-color: white !important;
  }
  .thlike{
    font-size: 0.825rem;
    color: rgba(55, 77, 103, 0.54);
    padding: 0.35rem 1rem;
  }
  .clear{
    display: none;
  }
</style>
@endsection

@section('content')
@php
Carbon\Carbon::setLocale('id');
@endphp
<div class="container page__heading-container">
    <div class="page__heading d-flex align-items-center justify-content-between">
        <h1 class="m-0">Submisi - {{$juri->lomba->nama}}</h1>
    </div>
</div>

<div class="container page__container">

  <div class="card card-form">
      <div class="row no-gutters">
          <div class="col-lg-12 card-form__body">
              <div class="table-responsive border-bottom" data-toggle="lists" data-lists-values="[&quot;judul_prop&quot;]">
                  <div class="search-form search-form--light m-3">
                      <input type="text" class="form-control search" placeholder="Cari judul proposal peserta">
                      <button class="btn" type="button" role="button"><i class="material-icons">search</i></button>
                  </div>
                  <table class="table mb-0 thead-border-top-0">
                      <thead>
                          <tr>
                              <th width="15%">Fakultas</th>
                              <th width= "50%">Judul-Ketua</th>
                              <th width="30%">File</th>
                          </tr>
                      </thead>
                      <tbody class="list">
                        @forelse($tims as $o => $tim)
                        @if( count($tim->pengumpulans) >= 1 )
                        <tr>
                            <td>
                              {{ $tim->anggotas[0]->fakultas->nama }}
                              <p><i>Pembimbing: {{$tim->dosen_pembimbing}}</i></p>
                            </td>
                            <td>
                              <strong class="judul_prop">{{ $tim->judul_proposal }}</strong>
                              <p>{{ $tim->anggotas[0]->nama }}</p>
                            </td>
                            <td>
                              <a href="javascript:void(0)" class="btn btn-light btn_detail" id="{{$tim->id}}"><i class="fas fa-info"></i> Informasi</a>
                              <a href="javascript:void(0)" class="btn btn-info btn_submisi" id="{{$tim->id}}"><i class="fas fa-file-download"></i> Submisi</a>
                            </td>
                        </tr>
                        <tr class="bg-lighter clear" id="detail-tim_{{$tim->id}}">
                            <td colspan="2"><strong>Abstrak</strong> <p>{{ $tim->abstrak }}</p></td>
                            <td style="vertical-align: top">
                              <strong>Anggota</strong>
                              <ol>
                              @foreach($tim->anggotas as $anggota)
                                <li>{{$anggota->nama}} - {{$anggota->nim}}</li>
                              @endforeach
                              </ol>
                            </td>
                        </tr>
                        <tr class="clear" id="submisi-tim-head_{{$tim->id}}">
                            <td class="thlike">Tanggal Pengumpulan</td>
                            <td class="thlike">Subjek dari "<strong>{{ $tim->judul_proposal }}</strong>"</td>
                            <td class="thlike">Berkas</td>
                        </tr>
                        <tr class="bg-lighter clear" id="submisi-tim_{{$tim->id}}">
                            @foreach($tim->pengumpulans as $p)
                              <td>{{ \Carbon\Carbon::parse($p->created_at)->isoFormat('D MMMM YYYY, h:mm:ss a') }}</td>
                              <td>{{$p->subjek}}</td>
                              <td><a href="{{asset($p->file)}}" target="_blank" class="btn btn-info"><i class="fas fa-cloud-download-alt"></i> Unduh</a>
                            @endforeach
                        </tr>
                        @endif
                        @empty
                          <td colspan="4">
                              <h6 style="margin:20px auto 40px auto;text-align:center">Belum ada peserta yang melakukan pengumpulan berkas.</h6>
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
var paginated = new List('list', {
  valueNames: ['judul_prop'],
  page: 10,
  pagination: true
});

$(document).on('click','.btn_detail',function(){
  var id_d = $(this).attr("id");
  $('#detail-tim_'+id_d).slideToggle();
});

$(document).on('click','.btn_submisi',function(){
  var id_s = $(this).attr("id");
  $('#submisi-tim-head_'+id_s).slideToggle();
  $('#submisi-tim_'+id_s).slideToggle();
});
</script>
@endsection
