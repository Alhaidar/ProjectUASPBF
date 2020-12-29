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
    @include('jadwal.include.bulkform')
</div>
@endsection

@section('js')
@endsection
