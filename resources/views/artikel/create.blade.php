@extends('layouts.apps')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('artikel.index') }}"> <i class="fas fa-arrow-left"></i> kembali</a>
                    <h4 class="card-title">Tambah Artikel</h4>
                    <form action="{{ route('artikel.store') }}" method="POST" enctype='multipart/form-data'>
                        @csrf
                        <div class="form-group mb-3">
                            <label for="gambar">Thumbnail</label>
                            <input type="file" name="gambar" class="form-control" required>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group mb-3">
                                    <label for="judul">Judul</label>
                                    <input name="judul" type="text" class="form-control" placeholder="Judul Artikel" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group mb-3">
                                    <label for="artikel">Artikel</label>
                                    <div id="quill_editor1"></div>
                                    <input type="hidden" id="quill_html1" name="artikel">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary mb-3 ms-0">Tambah</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
