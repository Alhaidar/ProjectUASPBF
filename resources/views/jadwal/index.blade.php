@extends('layouts.base')
@section('title', "Jadwal")

@section('css')
@endsection

@section('content')
<div class="container page__heading-container">
    <div class="page__heading d-flex align-items-center justify-content-between">
        <h1 class="m-0">Jadwal Presentasi</h1>
    </div>
</div>

<div class="container page__container">
  @if(Auth::user()->role == 'admin')
  <form action="#" class="mb-2">
      <div class="d-flex">
          <div class="form-inline ml-auto">
              <div class="form-group">
                <!-- <a href="{{route('jadwal.create')}}" class="btn btn-success ml-lg-3"><i class="fas fa-plus"></i> Tambah Jadwal Tunggal</a> -->
                <a href="javascript:void(0)" class="btn btn-success ml-lg-3" id="btn_bulkform"><i class="fas fa-calendar-alt"></i> Tambah Jadwal Masal</a>
              </div>
          </div>
      </div>
  </form>
  @endif
  @include('jadwal.include.bulkform')

  <div class="card card-form">
      <div class="row no-gutters" id="jadwal">
          <div class="col-lg-3 card-body">
              <p><strong class="headings-color">Jadwal</strong></p>
              <p class="text-muted">Jadwal presentasi dapat berubah sewaktu-waktu, pastikan untuk bersiap-siap 30 menit sebelum jam yang tertulis.</p>
          </div>
          <div class="col-lg-9 card-form__body">
              <div class="table-responsive border-bottom" data-toggle="lists" data-lists-values="[&quot;js-lists-values-employee-name&quot;]">
                  <div class="search-form search-form--light m-3">
                      <input type="text" class="form-control search" placeholder="Search">
                      <button class="btn" type="button" role="button"><i class="material-icons">search</i></button>
                  </div>
                  <table class="table mb-0 thead-border-top-0">
                      <thead>
                          <tr>
                              <th style="width: 150px;">Nama Ketua</th>
                              <th style="width: %;">Judul Proposal</th>
                              <th style="width: 200px;">Tanggal</th>
                              <th style="width: 37px;">Status</th>
                              <th style="width: 24px;"></th>
                          </tr>
                      </thead>
                      <tbody class="list" id="staff02">
                          @forelse($jadwal as $j)
                          <tr>
                              <td>
                                <strong>{{ $j->tim->lomba->nama }}</strong>
                                <p>{{ $j->tim->user->nama }}</p>
                              </td>
                              <td>{{ $j->tim->judul_proposal }}</td>
                              <td><small class="text-muted">{{ \Carbon\Carbon::parse($j->waktu_mulai)->format('d-M-yy H:m:s')}} s.d {{ \Carbon\Carbon::parse($j->waktu_berakhir)->format('d-M-yy H:m:s')}}</small></td>
                              @if($j->status == "1")
                              <td><span class="badge badge-success">Sudah Presentasi</span></td>
                              @else
                              <td><span class="badge badge-warning">Belum Presentasi</span></td>
                              @endif

                              @if(Auth::user()->role == 'admin')
                              <td><div class="dropdown ml-auto">
                                      <a href="#" data-toggle="dropdown" data-caret="false" class="text-muted" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                      <div class="dropdown-menu dropdown-menu-left" style="display: none;">
                                        <a class="dropdown-item" href="{{route('jadwal.edit', $j->id)}}">Ubah</a>
                                          <div class="dropdown-divider"></div>
                                        <a class="dropdown-item text-danger" href="{{route('jadwal.destroy', $j->id)}}">Hapus</a>
                                      </div>
                                  </div>
                              </td>
                              @endif
                          </tr>
                          @empty
                            <td colspan="4">
                                <h6 style="margin:20px auto 40px auto;text-align:center">Belum ada jadwal, lakukan pengumpulan untuk memperoleh jadwal.</h6>
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
     $("#bulkform").hide();
     $('#btn_bulkform').click(function(){
         $("#bulkform").slideToggle();
     });
});
</script>
@endsection
