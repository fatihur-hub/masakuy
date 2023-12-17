@extends('layouts.apps')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('resep.index') }}"> <i class="fas fa-arrow-left"></i> kembali</a>

                    <h4 class="card-title">Edit Resep</h4>
                    <form action="{{ route('resep.update', $resep->id) }}" method="POST" enctype='multipart/form-data'>
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                             <input type="file" name="gambar" class="form-control" accept="image/*">
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group mb-3">
                                    <label for="nama_resep">Nama Masakan</label>
                                    <input name="nama_resep" type="text" class="form-control" placeholder="Nama Masakan"
                                        value="{{ $resep->nama_resep }}" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group mb-3">
                                    <label for="asal_kota">Asal Kota</label>
                                    <input type="text" name="asal_kota" class="form-control" placeholder="Kota Asal"
                                        value="{{ $resep->asal_kota }}" required>
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
                                            <option value="{{ $category->id }}"
                                                {{ $resep->id_kategori == $category->id ? 'selected' : '' }}>
                                                {{ $category->kategori }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group mb-3">
                                    <label for="durasi">Durasi</label>
                                    <input type="text" name="durasi" class="form-control"
                                        placeholder="Dalam Menit | Misal 60" value="{{ $resep->durasi }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group mb-3">
                                    <label for="kesulitan">Kesulitan</label>
                                    <select class="form-control" name="kesulitan" required>
                                        <option value="mudah" {{ $resep->kesulitan == 'mudah' ? 'selected' : '' }}>Mudah
                                        </option>
                                        <option value="menengah" {{ $resep->kesulitan == 'menengah' ? 'selected' : '' }}>
                                            Menengah</option>
                                        <option value="sulit" {{ $resep->kesulitan == 'sulit' ? 'selected' : '' }}>Sulit
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group mb-3">
                                    <label for="bahan">Bahan</label>
                                    <div id="quill_editor">{!!$resep->bahan!!}</div>
                                    <input type="hidden" id="quill_html" name="bahan" value="{!!$resep->bahan!!}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group mb-3">
                                    <label for="langkah">Langkah</label>
                                    <div id="quill_editor1">{!!$resep->langkah!!}</div>
                                    <input type="hidden" id="quill_html1" name="langkah"  value="{!!$resep->langkah!!}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group mb-3">
                                    <label for="status">Status</label>
                                    <div>
                                        <label for="aktif">Aktif</label>
                                        <input type="radio" name="status" id="aktif" value="1"
                                            {{ $resep->status ? 'checked' : '' }}>

                                        <label for="nonaktif">Nonaktif</label>
                                        <input type="radio" name="status" id="nonaktif" value="0"
                                            {{ !$resep->status ? 'checked' : '' }}>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary mb-3 ms-0">Edit </button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
