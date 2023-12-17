@extends('layouts.apps')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('artikel.index') }}"> <i class="fas fa-arrow-left"></i> Kembali</a>
                    <h4 class="card-title">Edit Artikel</h4>
                    <form action="{{ route('artikel.update', $artikel->id) }}" method="POST" enctype='multipart/form-data'>
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <label for="gambar">Thumbnail</label>
                            <input type="file" name="gambar" class="form-control">
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group mb-3">
                                    <label for="judul">Judul</label>
                                    <input name="judul" type="text" class="form-control" placeholder="Judul Artikel"
                                        value="{{ $artikel->judul }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group mb-3">
                                    <label for="artikel">Artikel</label>
                                    <div id="quill_editor1">{!!$artikel->artikel!!}</div>
                                    <input type="hidden" id="quill_html1" name="artikel" value="{!!$artikel->artikel!!}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                @if (Auth()->user()->role == 'admin')
                                    
                                <div class="form-group mb-3">
                                    <label for="status">Status</label>
                                    <select name="status" class="form-control" required>
                                        <option value="enable" {{ $artikel->status == 'enable' ? 'selected' : '' }}>Enable
                                        </option>
                                        <option value="disable" {{ $artikel->status == 'disable' ? 'selected' : '' }}>
                                            Disable</option>
                                    </select>
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary mb-3 ms-0">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
