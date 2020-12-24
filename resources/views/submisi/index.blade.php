@extends('layouts.base')
@section('title', "Submisi")

@section('css')
@endsection

@section('content')
<div class="container page__heading-container">
    <div class="page__heading d-flex align-items-center justify-content-between">
        <h1 class="m-0">Submisi</h1>
    </div>
</div>

<div class="container page__container">

  <div class="card card-form">
      <div class="row no-gutters">
          <div class="col-lg-12 card-form__body">
              <div class="table-responsive border-bottom" data-toggle="lists" data-lists-values="[&quot;lists-bidang&quot;]">
                  <div class="search-form search-form--light m-3">
                      <input type="text" class="form-control search" placeholder="Cari submisi peserta">
                      <button class="btn" type="button" role="button"><i class="material-icons">search</i></button>
                  </div>
                  <table class="table mb-0 thead-border-top-0">
                      <thead>
                          <tr>
                              <th style="width: %;">Nama Tim</th>
                              <th style="width: %;">Judul Proposal</th>
                              <th style="width: %;">Subjek</th>
                              <th style="width: %;">Waktu Submit</th>
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
                            <td>{{ $p->created_at }}</td>
                            <td>{{ $p->file }} <br> <a href="" class="btn btn-info">Download</a></td>
                        </tr>
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
@endsection
