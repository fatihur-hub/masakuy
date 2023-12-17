@extends('layouts.apps')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                      <button type="button" class="close" data-dismiss="alert">×</button>	
                        <strong>{{ $message }}</strong>
                    </div>
                  @endif
                    <h4 class="card-title">Data Artikel</h4>
                    <a href="{{ route('artikel.create') }}" class="btn btn-primary mb-3">Tambah </a>
                    <div class="table-responsive">
                        <table id="dataTable" class="table table-striped table-bordered no-wrap">
                            <thead>
                                <tr>
                                    <th>Gambar</th>
                                    <th>Judul</th>
                                    @if (Auth::user()->role == 'admin')
                                        <th>Author</th>
                                    @endif
                                    <th>Artikel</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($artikel as $item)
                                    <tr>
                                        <td> <img class="img-thumbnail" style="height: 100px; width: 100px;"
                                                src="{{ asset('storage/gambar/' . $item->gambar) }}" alt="">
                                        </td>
                                        <td>{{ $item->judul }}</td>
                                        <td>{{ $item->author }}</td>
                                        <td>{{ Str::limit(strip_tags($item->artikel), 50) }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td>
                                            <form action="{{ route('artikel.destroy', $item->id) }}" method="POST">
                                                <a href="{{ route('artikel.show', $item->slug) }}"><i
                                                        class="fas fa-eye"></i></a>
                                                <a href="{{ route('artikel.edit', $item->id) }}"><i
                                                        class="far fa-edit"></i></a>
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-link" type="submit"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus artikel ini?')"><i
                                                        class="far fa-trash-alt"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
