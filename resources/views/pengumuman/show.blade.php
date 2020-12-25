@if(Auth::user())
  @php ($page = 'layouts.base')
@else
  @php ($page = 'layouts.front')
@endif
@extends($page)
@section('title', "Pengumuman")

@section('css')
@endsection

@section('content')
<div class="container-fluid page__heading-container">
    <div class="page__heading d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-lg-between text-center text-lg-left">
      <div class="col-md-12">
          <div class="card">
              <div class="card-header card-header-large bg-light d-flex align-items-center">
                  <div class="flex">
                      <h4 class="card-header__title" style="font-size:30px">{{ $pengumuman->judul }}</h4>
                  </div>
                  <div class="d-inline-flex align-items-center">
                      <i class="material-icons icon-16pt mr-1 text-muted">access_time</i> {{ $pengumuman->created_at->format('d/m/Y') }}
                  </div>
              </div>
              <div class="card-body">
                <div class="d-flex align-items-center py-2 border-bottom">
                    @if(is_null($pengumuman->thumbnail))
                        <img src="{{ asset('image/default_thumbnail.png') }}" style="height:100%; max-height: 400px; margin:0 auto" alt="Card image-top">
                    @else
                        <img src="{{ asset($pengumuman->thumbnail) }}" style="height:100%; max-height: 400px; margin:0 auto" alt="Card image-top">
                    @endif
                </div>
                <p> {!! $pengumuman->konten !!} </p>
              </div>
          </div>
          <div class="mb-2">
            <a href="{{route('pengumuman.index')}}" class="btn btn-light"><i class="fas fa-chevron-left"></i> Kembali</a>
            <a href="{{route('pengumuman.show',$pengumuman->id+1)}}" class="btn btn-info"><i class="fas fa-chevron-right"></i> Selanjutnya</a>
          </div>
      </div>
    </div>
</div>

@endsection

@section('js')
@endsection
