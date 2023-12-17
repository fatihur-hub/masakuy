@extends('layouts.apps')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('resep.index') }}" class="btn btn-secondary mb-3"><i class="fas fa-arrow-left"></i> Kembali</a>
                    <h2 class="card-title">{{ $resep->nama_resep }}</h2>

                    <div class="row">
                        <div class="col-md-6">
                            <img class="img-fluid rounded" src="{{ asset('storage/gambar/' . $resep->gambar) }}" alt="{{ $resep->nama_resep }}">
                        </div>
                        <div class="col-md-6">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><strong>Asal Kota:</strong> {{ $resep->asal_kota }}</li>
                                <li class="list-group-item"><strong>Kategori:</strong> {{ $resep->kategori->kategori }}</li>
                                <li class="list-group-item"><strong>Durasi:</strong> {{ $resep->durasi }} Menit</li>
                                <li class="list-group-item"><strong>Kesulitan:</strong> {{ $resep->kesulitan }}</li>
                                <li class="list-group-item"><strong>Status:</strong> {{ $resep->status ? 'Aktif' : 'Nonaktif' }}</li>
                            </ul>
                        </div>
                    </div>

                    <div class="mt-4">
                        <h4>Bahan:</h4>
                        {!! $resep->bahan !!}
                    </div>

                    <div class="mt-4">
                        <h4>Langkah-langkah:</h4>
                        {!! $resep->langkah !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
