@extends('layouts.base')
@section('title', "Lomba")

@section('css')
@endsection

@section('content')
<div class="container page__heading-container">
    <div class="page__heading d-flex align-items-center justify-content-between">
        <h1 class="m-0">Perlombaan</h1>
    </div>
</div>

<div class="container page__container">
  <div class="card card-form">
      <div class="row no-gutters">
          <div class="col-lg-3 card-body">
              <p><strong class="headings-color">Bidang Lomba</strong></p>
              <p class="text-muted">Bidang lomba yang tercatat dapat diikuti oleh berbagai tim</p>
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
                              <th>Nama Bidang Lomba</th>
                              <th style="width: %;">Batas Waktu Lomba</th>
                              <th style="width: 24px;"></th>
                          </tr>
                      </thead>
                      <tbody class="list" id="staff02">
                          @forelse($lomba as $l)
                          <tr>
                              <td>
                                  <strong>{{ $l->nama }}</strong>
                              </td>
                              <td><small class="text-muted">{{ $l->batas_waktu }}</small></td>
                              <td><div class="dropdown ml-auto">
                                      <a href="#" data-toggle="dropdown" data-caret="false" class="text-muted" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                      <div class="dropdown-menu dropdown-menu-right" style="display: none;">
                                        <a class="dropdown-item" href="{{route('lomba.edit',$l->id)}}">Ubah</a>
                                          <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{route('lomba.destroy',$l->id)}}">Hapus</a>
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
  <a href="{{ route('lomba.create') }}" class="btn btn-block btn-success">Tambah Bidang Lomba</a>
</div>
@endsection

@section('js')
@endsection
