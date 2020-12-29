@extends('layouts.base')
@section('title', "Ubah Jadwal")

@section('css')
@endsection

@section('content')
<div class="container page__heading-container">
    <div class="page__heading d-flex align-items-center justify-content-between">
        <h1 class="m-0">Ubah Jadwal Presentasi</h1>
    </div>
</div>

<div class="container page__container">
    <div class="mb-2">
      <a href="{{route('jadwal.index')}}" class="btn btn-light"><i class="fas fa-chevron-left"></i> Batal</a>
    </div>
    <div class="card card-form">
        <div class="row no-gutters">
            <div class="col-lg-3 card-body">
                <p><strong class="headings-color">Form Ubah Jadwal Presentasi</strong></p>
                <p class="text-muted">Jika melakukan perubahan jadwal, mohon menginformasikannya kepada juri dan peserta</p>
            </div>
            <div class="col-lg-9 card-form__body card-body">
                <form action="{{route('jadwal.update', $jadwal->id)}}" method="post">
                    @csrf
                    <input type="text" name="id_tim" value="{{$jadwal->tim->id}}" style="display:none">
                    <div class="form-group">
                        <label for="select01">Nama Ketua</label>
                        <input type="text" class="form-control" value="{{$jadwal->tim->user->nama}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="select01">Judul Proposal</label>
                        <input type="text" class="form-control" value="{{$jadwal->tim->judul_proposal}}" disabled>
                    </div>
                    <div class="form-group">
                        <label class="text-label" for="waktu_mulai">Tanggal Presentasi Dimulai</label>
                        <input type="datetime" class="form-control" name="waktu_mulai" id="waktu_mulai" value="{{$jadwal->waktu_mulai}}" required>
                    </div>
                    <div class="form-group">
                        <label class="text-label" for="waktu_berakhir">Tanggal Presentasi Berakhir</label>
                        <input type="datetime" class="form-control" name="waktu_berakhir" id="waktu_berakhir" value="{{$jadwal->waktu_berakhir}}" required>
                    </div>
                    <div class="flex">
                        <label for="status">Status Presentasi</label><br>
                        <div class="custom-control custom-checkbox-toggle custom-control-inline mr-1">
                            <input @if($jadwal->status == 1)  checked="" @endif  name="status" type="checkbox" id="status" class="custom-control-input inp">
                            <label class="custom-control-label tgler" for="status"></label>
                        </div>
                        <label for="status" class="mb-0 currentstate">@if($jadwal->status == 1)  Sudah Presentasi @else Belum Presentasi @endif</label>
                    </div>
            </div>
        </div>
        <button type="submit"class="btn btn-success">Simpan</button>
      </form>
    </div>
</div>
@endsection

@section('js')
<script type="text/javascript">
$(document).ready(function(){
  @if($jadwal->status == 1)
    var toogle = false
  @else
    var toogle = true
  @endif
     $('.tgler').click(function(){
       if(toogle == true){
         console.log(toogle)
         $('.currentstate').text('Sudah Presentasi')
         toogle = false;
       }else{
         console.log(toogle)
         $('.currentstate').text('Belum Presentasi')
         toogle = true;
       }


     });
});
</script>
@endsection
