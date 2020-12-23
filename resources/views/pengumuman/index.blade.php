@extends('layouts.base')
@section('title', "Pengumuman")

@section('css')
@endsection

@section('content')
  <div class="container page__heading-container">
      <div class="page__heading d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-lg-between text-center text-lg-left">
          <h1 class="m-lg-0">Pengumuman</h1>
      </div>
  </div>


  <div class="container page__container">

    <form action="#" class="mb-2">
        <div class="d-flex">
            <div class="search-form mr-3 search-form--light">
                <input type="text" class="form-control" placeholder="Cari Pengumuman" id="searchSample02">
                <button class="btn" type="button"><i class="material-icons">search</i></button>
            </div>
            @if(Auth::user()->role == 'admin')
            <div class="form-inline ml-auto">
                <div class="form-group">
                  <a href="{{ route('pengumuman.create') }}" class="btn btn-success ml-lg-3">Tambah Pengumuman <i class="material-icons">add</i></a>
                </div>
            </div>
            @endif
        </div>
    </form>

    <div class="row">
      @forelse($pengumuman as $p)
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center py-2 border-bottom">
                      <a href="{{route('pengumuman.show',$p->id)}}" class="card-img-top">
                      @if(is_null($p->thumbnail))
                          <img src="{{ asset('image/default_thumbnail.png') }}" style="width:100%;" alt="Card image-top">
                      @else
                          <img src="{{ asset($p->thumbnail) }}" style="width:100%;" alt="Card image-top">
                      @endif
                    </a>
                    </div>
                    <div class="d-flex align-items-center py-2 border-bottom" style="min-width: 200px;">
                        <div class="d-flex">
                            <div>
                                <h4 class="card-title mb-1 text-primary">{{ $p->judul }}</h4>
                                <span class="badge badge-pill badge-soft-secondary">
                                  {{ \Carbon\Carbon::parse($p->created_at)->format('d/m/Y')}}
                                </span>
                            </div>
                        </div>
                        @if(Auth::user()->role == 'admin')
                        <div class="dropdown ml-auto">
                            <a href="#" class="dropdown-toggle text-muted" data-caret="false" data-toggle="dropdown">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{route('pengumuman.edit',$p->id)}}">Ubah</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="{{route('pengumuman.destroy',$p->id)}}">Hapus</a>
                            </div>
                        </div>
                        @endif
                    </div>

                    <div class="flex" style="min-width: 200px;">
                        <div class="d-flex">
                            <p class="text-muted">{{ \Str::words($p->konten) }}</p>
                        </div>
                        <a href="{{ route('pengumuman.show',$p->id) }}" class="text-dark mb-2 text-decoration-none">
                            <strong>Baca Selengkapnya</strong>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @empty
          <td colspan="4">
              <h6 style="margin:20px auto 40px auto;text-align:center">Belum ada pengumuman.</h6>
          </td>
        @endforelse
    </div>
  </div>

@endsection

@section('js')
@endsection
