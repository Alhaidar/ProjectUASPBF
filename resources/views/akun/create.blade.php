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
  <form action="#" class="mb-2">
      <div class="d-flex">
          <div class="form-inline ml-auto">
              <div class="form-group">
                <a href="javascript:void(0)" class="btn btn-success ml-lg-3" id="btn_create"><i class="fas fa-user-plus"></i> Tambah Akun</a>
              </div>
          </div>
      </div>
  </form>
  <form action="{{route('akun.store')}}" method="post" id="create">
    <div class="card card-form">
    @csrf
    <div class="row no-gutters">
        <div class="col-lg-4 card-body">
            <p><strong class="headings-color">Tambah Akun Baru</strong></p>
            <p class="text-muted mb-0">kelola akun baru untuk role <code>admin</code> atau <code>juri</code>.</p>
        </div>
        <div class="col-lg-8 card-form__body card-body">
            <div class="form-group">
                <label for="email">Alamat Surel</label>
                <input name="email" id="email" type="email" class="form-control" placeholder="Alamat surel" required>
            </div>
            <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input name="nama" id="nama" type="text" class="form-control" placeholder="Nama" required>
            </div>
            <div class="form-group">
                <label for="role">Peran pengguna</label>
                <select class="form-control" name="role" required>
                  <option value="0" selected disabled>Pilih role:</option>
                  <option value="admin">Admin</option>
                  <option value="juri">Juri</option>
                </select>
            </div>
            <div class="form-group">
                <label for="passwd">Kata sandi</label>
                <input name="password" id="passwd" type="password" class="form-control" required placeholder="Kata sandi">
            </div>
          </div>
      </div>
      <button type="submit" class="btn btn-success">Simpan</button>
    </div>
  </form>
  <div class="card card-form">
    <div class="row no-gutters">
        <div class="col-lg-12 card-body">
          <div data-toggle="lists" data-lists-values='["nama", "role", "email"]' class="table-responsive border-bottom">
          <table class="table mb-0 thead-border-top-0">
            <thead class="bg-white">
                <tr>
                    <th width="30%">
                      <a href="javascript:void(0)" class="sort" data-sort="nama">Nama</a>
                      <a href="javascript:void(0)" class="sort desc" data-sort="role">Peran</a>
                    </th>
                    <th width="%"><a href="javascript:void(0)" class="sort desc" data-sort="email">Alamat Surel</a></th>
                    <th width="15%">Aksi</th>
                </tr>
            </thead>
            <tbody class="list">
                @foreach($users as $user)
                <tr>
                    <td>
                        <div class="media align-items-center">
                            <div class="media-body">
                                <strong class="nama">{{$user->nama}}</strong><br>
                                <span class="role">{{$user->role}}</span>
                            </div>
                        </div>
                    </td>
                    <td  class="email">{{$user->email}}</td>
                    <td class="text-right">
                        <div class="dropdown ml-auto">
                            <a href="#" class="dropdown-toggle text-muted" data-caret="false" data-toggle="dropdown">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{route('akun.edit',$user->id)}}">Ubah</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="{{route('akun.destroy',$user->id)}}">Hapus</a>
                            </div>
                        </div>
                    </td>

                </tr>
                @endforeach
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
     $("#create").hide();
     $('#btn_create').click(function(){
         $("#create").slideToggle();
     });
});
</script>
@endsection
