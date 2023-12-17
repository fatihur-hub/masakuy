@extends('layouts.apps')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('resep.index') }}"> <i class="fas fa-arrow-left"></i> kembali</a>
                    <h4 class="card-title">Resep Anda</h4>
                    <form action="{{ route('resep.store') }}" method="POST" enctype='multipart/form-data'>
                        @csrf
                        <div class="form-group mb-3">
                            <input type="file" name="gambar" class="form-control" required>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group mb-3">
                                    <label for="nama_resep">Nama Masakan</label>
                                    <input name="nama_resep" type="text" class="form-control" placeholder="Nama Masakan"
                                        required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group mb-3">
                                    <label for="asal_kota">Asal Kota</label>
                                    <input type="text" name="asal_kota" class="form-control" placeholder="Kota Asal"
                                        required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group mb-3">
                                    <label for="id_kategori">Kategori</label>
                                    <select class="form-control" name="id_kategori" required>
                                        <option value="" disabled selected>Pilih Kategori</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->kategori }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group mb-3">
                                    <label for="durasi">Durasi</label>
                                    <input type="text" name="durasi" class="form-control"
                                        placeholder="Dalam Menit | Misal 60" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group mb-3">
                                    <label for="kesulitan">Kesulitan</label>
                                    <select class="form-control" name="kesulitan" required>
                                        <option value="mudah">Mudah</option>
                                        <option value="menengah">Menengah</option>
                                        <option value="sulit">Sulit</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group mb-3">
                                    <label for="bahan">Bahan</label>
                                    {{-- <input id="x" type="hidden" name="bahan">
                                    <trix-editor input="x"></trix-editor> --}}
                                    <div id="quill_editor1"></div>
                                    <input type="hidden" id="quill_html1" name="bahan"></input>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group mb-3">
                                    <label for="langkah">Langkah</label>
                                    <div id="quill_editor"></div>
                                    <input type="hidden" id="quill_html" name="langkah">
                                </div>
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
