@extends('layouts.base')
@section('title', "Akun")

@section('css')
@endsection

@section('content')
<div class="container page__heading-container">
    <div class="page__heading d-flex align-items-center justify-content-between">
        <h1 class="m-0">Akun</h1>
    </div>
</div>

<div class="container page__heading-container">
  <form action="{{route('akun.update', Auth::user()->id)}}" method="post">
  <div class="card card-form">
    @csrf
    @method('patch')
      <div class="row no-gutters">
          <div class="col-lg-4 card-body">
              <p><strong class="headings-color">Akun</strong></p>
              <p class="text-muted mb-0">kelola informasi akun dan akses.</p>
          </div>
          <div class="col-lg-8 card-form__body card-body">
              <div class="form-group">
                  <label for="email">Alamat Surel</label>
                  <input id="email" type="email" class="form-control" placeholder="Alamat surel" value="{{Auth::user()->email}}" disabled required>
              </div>
              <div class="form-group">
                  <label for="nama">Nama Lengkap</label>
                  <input name="nama" id="nama" type="text" class="form-control" placeholder="Nama" value="{{Auth::user()->nama}}" required>
              </div>
              <a class="text-decoration-none" href="javascript:void(0)" id="btn_editsandi"><i class="fas fa-edit"></i> Edit kata sandi</a>
              <div class="form-group" id="editsandi">
                  <label for="passwd">Kata sandi</label>
                  <input name="password" id="passwd" type="password" class="form-control" placeholder="Kata sandi">
              </div>
              <hr>
              <div class="form-group">
                  <label for="old_passwd">Konfirmasi kata sandi</label>
                  <input name="old_passwd" id="old_passwd" type="password" class="form-control" placeholder="Konfirmasi kata sandi" required>
              </div>
          </div>
      </div>
      <button type="submit" class="btn btn-success">Simpan</button>
      </form>
  </div>
  @if(Auth::user()->role =='peserta')
  <form action="{{route('tim.update',$tim->id)}}" method="post">
  <div class="card card-form" id="manage-team">
      @csrf
      @method('patch')
      <div class="row no-gutters">
          <div class="col-lg-4 card-body">
              <p><strong class="headings-color">Tim</strong></p>
              <p class="text-muted mb-0">Kelola data tim dan kelengkapan lomba. Gunakan tombol berikut untuk menambah maupun menghapus anggota. </p>
              <a href="javascript:void(0)" class="btn btn-primary btn-sm entri_baru"><i class="fas fa-user-plus"> Tambah anggota</i></a>
              <a class="btn btn-danger btn-sm hapus_entri" href="javascript:void(0);"><i class="fas fa-user-times"> Hapus anggota terakhir</i></a>
          </div>
          <div class="col-lg-8 card-form__body card-body">
            <div class="card-header card-header-tabs-basic nav" role="tablist">
                <a href="#perlombaan" class="active" data-toggle="tab" role="tab" aria-controls="activity_all" aria-selected="true">Perlombaan</a>
                <a href="#tim" data-toggle="tab" role="tab" aria-selected="false">Tim</a>
            </div>
            <div class="card-body tab-content">
                <div class="tab-pane fade active show" id="perlombaan">
                    <div class="form-group">
                        <label for="lomba">Lomba</label>
                        <select id="lomba" class="form-control form-control-prepended" name="id_lomba" required>
                          <option value="0" disabled>Pilih Bidang Lomba:</option>
                          @foreach ($lomba as $key => $value)
                            <option value="{{$value->id}}" @if($tim->id_lomba == $value->id) selected @endif >{{$value->nama}}</option>
                          @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input value="{{$tim->judul_proposal}}" id="judul_proposal" class="form-control form-control-prepended" type="text" name="judul_proposal" placeholder="Judul Proposal Lomba">
                    </div>
                    <div class="form-group">
                        <label for="abstrak">Abstrak</label>
                        <textarea id="abstrak" class="form-control form-control-prepended" name="abstrak">{{$tim->abstrak}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="dospem">Dosen Pembimbing</label>
                        <input value="{{$tim->dosen_pembimbing}}" id="dospem" class="form-control form-control-prepended" type="text" name="dosen_pembimbing" required placeholder="Nama Lengkap Dosen Pembimbing">
                    </div>
                    <div class="form-group">
                        <label for="dospem">Nomer Induk Dosen</label>
                        <input value="{{$tim->nomor_induk_dosen}}" id="nidn" class="form-control form-control-prepended" type="number" name="nomor_induk_dosen" required placeholder="NIDN Dosen Pembimbing">
                    </div>
                </div>
                <div class="tab-pane fade" id="tim">
                    @foreach($tim->anggotas as $urut => $anggota)
                    <div class="anggota_group_{{$urut}}">
                        <h5 class="text-primary">@if($urut == '0') Ketua @else Anggota {{$urut}} @endif</h5>
                        <div class="form-group">
                            <label for="nama_{{$urut}}">Nama</label>
                            <input value="{{$anggota->nama}}" id="nama_{{$urut}}" class="form-control form-control-prepended" type="text" name="nama[]" required placeholder="Nama lengkap">
                        </div>
                        <div class="form-group">
                            <label for="nim_{{$urut}}">NIM</label>
                            <input value="{{$anggota->nim}}" id="nim_{{$urut}}" class="form-control form-control-prepended" type="number" name="nim[]" required placeholder="Nama lengkap">
                        </div>
                        <div class="form-group">
                            <label for="no_telp_{{$urut}}">Nomor Telepon</label>
                            <input value="{{$anggota->no_telp}}" id="no_telp_{{$urut}}" class="form-control form-control-prepended" type="number" name="no_telp[]" required placeholder="Nama lengkap">
                        </div>
                        <div class="form-group">
                            <label for="email_{{$urut}}">Alamat Surel</label>
                            <input value="{{$anggota->email}}" id="email_{{$urut}}" class="form-control form-control-prepended" type="email" name="email[]" required placeholder="Nama lengkap">
                        </div>
                        <div class="form-group">
                            <label for="faculty_{{$urut}}">Fakultas</label>
                            <select id="faculty_{{$urut}}" class="form-control form-control-prepended" name="fakultas[]" required>
                              <option value="0" selected disabled>Pilih Fakultas:</option>
                              @foreach ($fakultas as $key => $value)
                                <option value="{{$value->id}}" @if($anggota->id_fakultas == $value->id) selected @endif >{{$value->nama}}</option>
                              @endforeach
                            </select>
                        </div>
                    </div>
                    @endforeach
                    <div class="extra"></div>
                    <a href="javascript:void(0)" class="btn btn-primary btn-sm entri_baru"><i class="fas fa-user-plus"></i></a>
                    <a class="btn btn-danger btn-sm hapus_entri" href="javascript:void(0);"><i class="fas fa-user-times"></i></a>
                </div>
            </div>
          </div>
      </div>
      <button type="submit" class="btn btn-success">Simpan</button>
      </form>
  </div>
  @endif
</div>
@endsection

@section('js')
<script type="text/javascript">
$(document).ready(function(){
     $("#editsandi").hide();
     $('#btn_editsandi').click(function(){
         $("#editsandi").slideToggle();
     });
     @if(Auth::user()->id == 'peserta')
     $(document).on('click','.hapus_entri',function(){
       var id_field = i;

       if(1 == i){
          return
       }else{
          $(".anggota_group_"+id_field+"").remove()
          i--;
       }
     });
     var init = {{$urut}}
     var i = {{$urut}};
     $(".entri_baru").click(function(){
       if(i>=5){
         return
       }
       i++;
       $(".extra").append(`
 <div class="anggota_group_`+i+`">
   <h5 class="text-primary">Anggota `+i+`</h5>
   <div class="form-group">
       <label for="nama_`+i+`">Nama</label>
       <input id="nama_`+i+`" class="form-control form-control-prepended" type="text" name="nama[]" placeholder="Nama lengkap">
   </div>
   <div class="form-group">
       <label for="nim_`+i+`">NIM</label>
       <input id="nim_`+i+`" class="form-control form-control-prepended" type="number" name="nim[]" placeholder="Nama lengkap">
   </div>
   <div class="form-group">
       <label for="no_telp_`+i+`">Nomor Telepon</label>
       <input id="no_telp_`+i+`" class="form-control form-control-prepended" type="number" name="no_telp[]" placeholder="Nama lengkap">
   </div>
   <div class="form-group">
       <label for="email_`+i+`">Alamat Surel</label>
       <input id="email_`+i+`" class="form-control form-control-prepended" type="email" name="email[]" placeholder="Nama lengkap">
   </div>
   <div class="form-group">
       <label for="faculty_`+i+`">Fakultas</label>
       <select id="faculty_`+i+`" class="form-control form-control-prepended" name="fakultas[]">
         <option value="0" selected disabled>Pilih Fakultas:</option>
         @foreach ($fakultas as $key => $value)
           <option value="{{$value->id}}">{{$value->nama}}</option>
         @endforeach
       </select>
   </div>
</div>
`);
     });
     @endif
 });

</script>
@endsection
