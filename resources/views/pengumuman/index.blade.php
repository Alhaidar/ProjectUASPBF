@extends('layouts.base')
@section('title', "Pengumuman")

@section('css')
@endsection

@section('content')
  <div class="container page__heading-container">
    <div class="page__heading d-flex align-items-center justify-content-between mb-0">
        <h1 class="m-0">Pengumuman</h1>
    </div>
  </div>


  <div class="container page__container">

    <form action="#" class="mb-2">
        <div class="d-flex">
            <div class="search-form mr-3 search-form--light">
                <input type="text" class="form-control" placeholder="Cari Fakultas" id="searchSample02">
                <button class="btn" type="button"><i class="material-icons">search</i></button>
            </div>

            <div class="form-inline ml-auto">
                <div class="form-group">
                  <a href="{{ route('pengumuman.create') }}" class="btn btn-success ml-lg-3">Tambah Pengumuman <i class="material-icons">add</i></a>
                </div>
            </div>
        </div>
    </form>

    <div class="row">
      @forelse($pengumuman as $p)
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center py-2 border-bottom">
                      @if($p->tumbnail == "")
                      <a href="#" class="card-img-top">
                          <img src="http://127.0.0.1:8000/image/default_tumbnail.png" style="width:100%;" alt="Card image-top">
                      </a>
                      @else
                      <a href="#" class="card-img-top">
                          <img src="{{ $p->tumbnail }}" style="width:100%;" alt="Card image-top">
                      </a>
                      @endif
                    </div>
                    <div class="d-flex align-items-center py-2 border-bottom" style="min-width: 200px;">
                        <div class="d-flex">
                            <div>
                                <h4 class="card-title mb-1">{{ $p->judul }}</h4>
                                <p class="text-muted">{{ $p->created_at }}</p>
                            </div>
                        </div>
                        <div class="dropdown ml-auto">
                            <a href="#" class="dropdown-toggle text-muted" data-caret="false" data-toggle="dropdown">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#">Edit</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="#">Hapus</a>
                            </div>
                        </div>
                    </div>

                    <div class="flex" style="min-width: 200px;">
                        <div class="d-flex">
                            <p>{{ $p->konten }}</p>
                        </div>
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
