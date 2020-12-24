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
          <div class="form-inline ml-auto">
              <div class="form-group">
                <a href="{{ route('pengumpulan.create') }}" class="btn btn-success ml-lg-3">Tambah Pengumpulan <i class="material-icons">add</i></a>
              </div>
          </div>
      </div>
  </form>

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
                              <th style="width: %;">Subjek</th>
                              <th style="width: 24px;">File</th>
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
                            <td>{{ $p->file }} <br> <a href="" class="btn btn-info">Download</a></td>
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
@endsection
