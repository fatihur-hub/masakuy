@extends('layouts.apps')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{route('artikel.index')}}"><i class="fas fa-arrow-left"></i>kembali</a>
                    <h4 class="card-title">{{ $artikel->judul }}</h4>
                    <img class="img-thumbnail" style="height: 100px; width: 100px;"
                        src="{{ asset('storage/gambar/' . $artikel->gambar) }}" alt="">
                    <p>Author: {{ $artikel->user->name }}</p>
                    <hr>
                    <p>{!!$artikel->artikel!!}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
