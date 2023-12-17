@extends('layouts.apps')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">halo {{ Auth::user()->name }}</h5>
                <h1>Selamat Datang di Masakuy!</h1>
                <p>Nikmati beragam resep masakan Nusantara yang lezat dan autentik.</p>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
