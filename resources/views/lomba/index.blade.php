@extends('layouts.base')
@section('title', "Lomba")

@section('css')
@endsection

@section('content')
<div class="container page__heading-container">
    <div class="page__heading d-flex align-items-center justify-content-between">
        <h1 class="m-0">Bidang Lomba</h1>
    </div>
</div>

<div class="container page__container">

  <form action="#" class="mb-2">
      <div class="d-flex">
          @if(Auth::user()->role == 'admin')
          <div class="form-inline ml-auto">
              <div class="form-group">
                <a href="{{ route('lomba.create') }}" class="btn btn-success ml-lg-3">Tambah Bidang Lomba <i class="material-icons">add</i></a>
              </div>
          </div>
          @endif
      </div>
  </form>

  <div class="card card-form">
      <div class="row no-gutters">
          <div class="col-lg-3 card-body">
              <p><strong class="headings-color">Bidang Lomba</strong></p>
              <p class="text-muted">Bidang lomba yang tercatat dapat diikuti oleh berbagai tim</p>
          </div>
          <div class="col-lg-9 card-form__body">
              <div class="table-responsive border-bottom" data-toggle="lists" data-lists-values="[&quot;lists-bidang&quot;]">
                  <div class="search-form search-form--light m-3">
                      <input type="text" class="form-control search" placeholder="Cari nama bidang lomba">
                      <button class="btn" type="button" role="button"><i class="material-icons">search</i></button>
                  </div>
                  <table class="table mb-0 thead-border-top-0">
                      <thead>
                          <tr>
                              <th>Nama Bidang Lomba</th>
                              <th style="width: %;">Batas Waktu Lomba</th>
                              <th style="width: 24px;"></th>
                          </tr>
                      </thead>
                      <tbody class="list" id="staff02">
                          @forelse($lomba as $l)
                          <tr>
                              <td>
                                  <strong class="lists-bidang">{{ $l->nama }}</strong>
                              </td>
                              <?php Carbon\Carbon::setLocale('id'); ?>
                              <td><small class="text-muted">{{ \Carbon\Carbon::parse($l->batas_waktu)->isoFormat('D MMMM YYYY, h:mm:ss a') }}</small></td>
                              <!-- <td><small class="text-muted">{{ $l->batas_waktu }}</small></td> -->
                              <td><div class="dropdown ml-auto">
                                      <a href="#" data-toggle="dropdown" data-caret="false" class="text-muted" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                      <div class="dropdown-menu dropdown-menu-right" style="display: none;">
                                        <a class="dropdown-item" href="{{route('lomba.edit',$l->id)}}">Ubah</a>
                                          <div class="dropdown-divider"></div>
                                        <a class="dropdown-item text-danger" href="{{route('lomba.destroy',$l->id)}}">Hapus</a>
                                      </div>
                                  </div>
                              </td>
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
@endsection
