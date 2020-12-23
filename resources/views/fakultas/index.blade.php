@extends('layouts.base')
@section('title', "Fakultas")

@section('css')
@endsection

@section('content')
  <div class="container page__heading-container">
      <div class="page__heading d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-lg-between text-center text-lg-left">
          <h1 class="m-lg-0">Fakultas</h1>
      </div>
  </div>

  <div class="container page__container">

    <form action="#" class="mb-2">
        <div class="d-flex">
            <div class="search-form mr-3 search-form--light">
                <form action="{{route('fakultas.index')}}" method="GET">
                  <input type="text" name="q"class="form-control" placeholder="Cari Fakultas" value="{{ $keyword }}">
                  <button class="btn" type="submit"><i class="material-icons">search</i></button>
                </form>
            </div>
            @if(Auth::user()->role == 'admin')
            <div class="form-inline ml-auto">
                <div class="form-group">
                  <a href="{{ route('fakultas.create') }}" class="btn btn-success ml-lg-3">Tambah Fakultas <i class="material-icons">add</i></a>
                </div>
            </div>
            @endif
        </div>
    </form>

    <div class="row">
      @forelse($fakultas as $f)
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-column flex-sm-row">
                        <a href="#" class="avatar mb-3 w-xs-plus-down-100 mr-sm-3">
                            <img src="http://127.0.0.1:8000/image/logo_emblem.png" alt="Card image cap" class="avatar-course-img">
                        </a>
                        <div class="flex" style="min-width: 200px;">
                            <div class="d-flex">
                                <div>
                                    <h4 class="card-title mb-1">{{ $f->nama }}</h4>
                                    <p class="text-muted">UNIVERSITAS JEMBER</p>
                                </div>
                                <div class="dropdown ml-auto">
                                    <a href="#" class="dropdown-toggle text-muted" data-caret="false" data-toggle="dropdown">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="{{route('fakultas.edit',$f->id)}}">Ubah</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item text-danger" href="{{route('fakultas.destroy',$f->id)}}">Hapus</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
          <td colspan="4">
              <h6 style="margin:20px auto 40px auto;text-align:center">Belum ada jadwal, lakukan pengumpulan untuk memperoleh jadwal.</h6>
          </td>
        @endforelse
      </div>
  </div>
@endsection

@section('js')
@endsection
