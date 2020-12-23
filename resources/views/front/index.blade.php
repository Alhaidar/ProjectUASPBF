@extends('layouts.front')
@section('title', "Home")

@section('css')
<style media="screen">
  a{
    text-decoration: none !important;
  }
</style>
@endsection

@section('content')
<div class="container-fluid page__container">
    <h4 class="card-header__title mb-3">Pengumuman</h4>
    <div class="row card-group-row" id="pengumuman">
        @forelse($pengumuman as $p)
        <a href="{{ route('pengumuman.show',$p->id) }}">
        <div class="col-lg-3 col-md-4 card-group-row__col">
            <div class="card card-group-row__card ">
                <div class="card-body d-flex flex-column">
                  <a href="{{ route('pengumuman.show',$p->id) }}" class="card-img-top">
                    @if(is_null($p->thumbnail))
                        <img src="{{ asset('image/default_thumbnail.png') }}" style="width:100%" alt="Card image-top">
                    @else
                        <img src="{{ asset($p->thumbnail) }}" style="width:100%" alt="Card image-top">
                    @endif
                  </a>
                    <div class="h4 text-primary">{{$p->judul}}</div>
                    <div class="d-flex justify-content-between align-items-center">
                      <div>
                        <span class="badge badge-pill badge-soft-secondary">
                          {{ \Carbon\Carbon::parse($p->created_at)->format('d/m/Y')}}
                        </span>
                      </div>

                    </div>
                    <p class="text-muted">{{ \Str::words($p->konten) }}</p>
                    <a href="{{ route('pengumuman.show',$p->id) }}" class="text-dark mb-2">
                        <strong>Baca Selengkapnya</strong>
                    </a>

                </div>
            </div>
        </div>
        </a>
        @empty
          <h6 style="margin:20px auto 80px auto">Belum ada pengumuman</h6>
        @endforelse
    </div>

    <div class="row no-gutters" id="jadwal">
      <div class="col-lg-4 card-body">
          <p><strong class="headings-color">JADWAL PRESENTASI</strong></p>
          <p class="text-muted">Jadwal presentasi dapat berubah sewaktu-waktu, pastikan untuk bersiap-siap 30 menit sebelum jam yang tertulis. </p>
      </div>
      <div class="col-lg-8 card-form__body">
          <div class="table-responsive border-bottom" data-toggle="lists" data-lists-values="[&quot;js-lists-values-employee-name&quot;]">
              <div class="search-form search-form--light m-3">
                  <input type="text" class="form-control search" placeholder="Search">
                  <button class="btn" type="button" role="button"><i class="material-icons">search</i></button>
              </div>
              <table class="table mb-0 thead-border-top-0">
                  <thead>
                      <tr>
                          <th>Kelompok</th>
                          <th style="width: %;">Judul</th>
                          <th style="width: %;">Tanggal</th>
                          <th style="width: 37px;">Status</th>
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
                          <td><small class="text-muted">{{ \Carbon\Carbon::parse($j->waktu_mulai)->format('dd-MM-yyyy HH:mm:ss')}} s.d {{ \Carbon\Carbon::parse($j->waktu_berakhir)->format('dd-MM-yyyy HH:mm:ss')}}</small></td>
                          @if($j->status == "1")
                          <td><span class="badge badge-primary">Sudah Presentasi</span></td>
                          @else
                          <td><span class="badge badge-warning">Belum Presentasi</span></td>
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

@endsection

@section('js')
@endsection
