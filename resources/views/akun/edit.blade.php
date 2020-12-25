@extends('layouts.base')
@section('title', "Akun")

@section('css')
@endsection

@section('content')
<div class="container page__heading-container">
    <div class="page__heading d-flex align-items-center justify-content-between">
        <h1 class="m-0">Kelola Akun</h1>
    </div>
</div>

<div class="container page__heading-container">
  <form action="{{route('akun.manage',$user->id)}}" method="post" id="create">
    <div class="card card-form">
    @csrf
    @method('patch')
    <div class="row no-gutters">
        <div class="col-lg-4 card-body">
            <p><strong class="headings-color">Form Ubah Akun Baru</strong></p>
            <p class="text-muted mb-0">Ubah informasi dari akun {{$user->nama}}.</p>
        </div>
        <div class="col-lg-8 card-form__body card-body">
            <div class="form-group">
                <label for="email">Alamat Surel</label>
                <input name="email" value="{{$user->email}}" id="email" type="email" class="form-control" placeholder="Alamat surel" disabled>
            </div>
            <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input name="nama" value="{{$user->nama}}" id="nama" type="text" class="form-control" placeholder="Nama" required>
            </div>
            <div class="form-group">
                <label for="role">Peran pengguna</label>
                <select class="form-control" name="role" required>
                  <option value="0" selected disabled>Pilih role:</option>
                  <option value="admin" @if ($user->role == "admin") selected @endif >Admin</option>
                  <option value="juri" @if ($user->role == "juri") selected @endif >Juri</option>
                </select>
            </div>
            <div class="form-group">
                <label for="passwd">Kata sandi</label>
                <input name="password" id="passwd" type="password" class="form-control" placeholder="Kata sandi">
            </div>
          </div>
      </div>
      <button type="submit" class="btn btn-success">Simpan</button>
    </div>
  </form>
</div>
@endsection
