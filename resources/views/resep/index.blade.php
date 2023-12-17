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
                    <h4 class="card-title">Resep Anda</h4>
                    <a href="{{route('resep.create')}}" class="btn btn-primary mb-3">Tambah </a>
                    <div class="table-responsive">
                        <table id="dataTable" class="table table-striped table-bordered no-wrap">
                            <thead>
                                <tr>
                                    <th>Gambar</th>
                                    <th>Nama Resep</th>
                                    @if (Auth::user()->role == 'admin')
                                        <th>Author</th>
                                    @endif
                                    <th>Asal Kota</th>
                                    <th>Kategori</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reseps as $resep)
                                    <tr>
                                        <td>{{ $resep->id }}</td>
                                        <td> <img class="img-thumbnail" style="height: 100px; width: 100px;"
                                                src="{{ asset('storage/gambar/' . $resep->gambar) }}" alt="">
                                        </td>
                                        <td>{{ $resep->nama_resep }}</td>
                                        <td>{{ $resep->asal_kota }}</td>
                                        <td>{{ $resep->kategori->kategori }}</td>
                                        <td>{{ $resep->status ? 'True' : 'False' }}</td>
                                        <td>
                                            <form action="{{ route('resep.destroy', $resep->id) }}" method="POST">
                                                <a href="{{ route('resep.show', $resep->id) }}"><i class="fas fa-eye"></i></a>
                                                <a href="{{ route('resep.edit', $resep->id) }}"><i class="far fa-edit"></i></a>
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-link" type="submit"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus resep ini?')"><i class="far fa-trash-alt"></i></button>
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
