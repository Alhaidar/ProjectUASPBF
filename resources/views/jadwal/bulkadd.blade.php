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
    <div class="mb-2">
      <a href="{{route('jadwal.index')}}" class="btn btn-light"><i class="fas fa-chevron-left"></i> Batal</a>
    </div>
    <div class="card card-form">
        <div class="row no-gutters">
          <div class="col-lg-12 card-form__body card-body">
              <form class="" action="{{route('jadwal.bulkstore')}}" method="post">
                @csrf
                  <div class="form-group">
                      <div class="row">
                          <div class="col">
                              <label>Bidang</label>
                          </div>
                          <div class="col">
                              <label>Ketua</label>
                          </div>
                          <div class="col">
                              <label>Judul</label>
                          </div>
                          <div class="col">
                              <label>Waktu Presentasi Dimulai</label>
                          </div>
                          <div class="col">
                              <label>Waktu Presentasi Berakhir</label>
                          </div>
                      </div>
                  </div>
                  @php($recent = null)
                  @forelse($tims as $tim)
                  @php($render = TRUE)
                  @if( $tim->pengumpulans->count()>=1 )
                      @if($tujuan == 'nonjadwal' && $tim->jadwals->count() >=1)
                        @php($render = FALSE)
                      @endif

                      @if($render)
                          @if( is_null($recent) )
                              @php($recent = $pstart)
                          @endif
                      <div class="form-group" id="entries_{{$tim->id}}">
                          <div class="row">
                              <input type="text" value="{{$tim->id}}" name="id_tim[]" class="form-control" style="display:none">
                              <div class="col">
                                  <input type="text" value="{{$tim->lomba->nama}}" class="form-control" disabled>
                              </div>
                              <div class="col">
                                  <input type="text" value="{{$tim->user->nama}}" class="form-control" disabled>
                              </div>
                              <div class="col">
                                  <input type="text" value="{{$tim->judul_proposal}}" class="form-control" disabled>
                              </div>
                              <div class="col">
                                  <input type="datetime" value="{{$recent}}" name="waktu_mulai[]" class="form-control" required>
                              </div>
                              @php( $recent = Carbon\Carbon::parse($pstart)->addMinute($ptime) )
                              <div class="col">
                                  <input type="datetime" value="{{$recent}}" name="waktu_berakhir[]" class="form-control" required>
                              </div>
                              @if(Carbon\Carbon::parse($recent) < Carbon\Carbon::parse($pend) && Carbon\Carbon::parse($recent) > Carbon\Carbon::parse($pstart)):

                              @else
                                  @php( $recent = Carbon\Carbon::parse($pstart)->addDay() )
                              @endif
                          </div>
                      </div>
                      @endif
                  @endif
                  @empty
                  <h3>Tidak ada target yang memenuhi kelompok</h3>
                  @endforelse

          </div>
        </div>
        <button type="submit"class="btn btn-success">Tambah</button>
      </form>
    </div>
</div>
@endsection

@section('js')
@endsection
