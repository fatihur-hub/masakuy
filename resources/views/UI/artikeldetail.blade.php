@extends('ui.layout.app')
@section('content')
<div class="container" style="margin-bottom: 12px;height: 500;">
    <div class="card" style="height: 500px;">
        <div class="card-body d-lg-flex justify-content-lg-center align-items-lg-center" style="background: var(--swiper-theme-color);">
            <h1 class="card-title">{{$artikel->judul}}</h1>
        </div>
    </div>
</div><!-- End: Hero Overlay -->
<div class="container" style="margin-bottom: 21px;">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Isi Artikel</h4>
            <h5>{{$artikel->user->nama}}</h5>
            <p>{!!$artikel->artikel!!}</p>
        </div>
    </div>
</div
@endsection