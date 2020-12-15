@extends('layouts.base')
@section('title', "Tambah Jadwal")

@section('css')
@endsection

@section('content')
<div class="container page__heading-container">
    <div class="page__heading d-flex align-items-center justify-content-between">
        <h1 class="m-0">Tambah Jadwal Presentasi</h1>
    </div>
</div>

<div class="container page__container">
    <div class="card card-form">
        <div class="row no-gutters">
            <div class="col-lg-3 card-body">
                <p><strong class="headings-color">Form Tambah Jadwal Presentasi</strong></p>
                <p class="text-muted">Pastikan jadwal yang ditambahkan tidak bertabrakan dengan jadwal yang lain</p>
            </div>
            <div class="col-lg-9 card-form__body card-body">
                <form>
                    <div class="form-group">
                        <label for="select01">Nama Ketua</label>
                        <select id="select01" data-toggle="select" class="form-control">
                            <option selected="">My first option</option>
                            <option>Another option</option>
                            <option>Third option is here</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="select01">Judul Proposal</label>
                        <select id="select01" data-toggle="select" class="form-control">
                            <option selected="">My first option</option>
                            <option>Another option</option>
                            <option>Third option is here</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Waktu Presentasi Dimulai</label>
                        <input type="datetime-local" class="form-control" id="waktu_mulai_presentasi" name="waktu_presentasi">
                    </div>
                    <div class="form-group">
                        <label for="">Waktu Presentasi Selesai</label>
                        <input type="datetime-local" class="form-control" id="waktu_selesai_presentasi" name="waktu_presentasi">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="text-right mb-5">
      <a href="" class="btn btn-danger">Batal</a>
      <a href="" class="btn btn-primary">Tambah</a>
    </div>
</div>
@endsection

@section('js')
@endsection
