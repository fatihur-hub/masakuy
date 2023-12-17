





@extends('layouts.apps')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Resep Anda</h4>
                    <form action="{{ route('kategori.store') }}" method="POST" enctype='multipart/form-data'>
                        @csrf
 
                        <div class="row">
                            <div class="col">
                                <div class="form-group mb-3">
                                    <label for="kategori">kategori</label>
                                    <input name="kategori" type="text" class="form-control" placeholder="kategori | Misal Minuman" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group mb-3">
                                    <label for="thumbnail">Thumbnail</label>
                                    <input type="file" name="thumbnail" accept="image" class="form-control" placeholder="Kota Asal" required>
                                </div>
                            </div>
                        </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary mb-3 ms-0">Tambah </button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
