






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
                    <h4 class="card-title">Kategori</h4>
                    <a href="{{route('kategori.create')}}" class="btn btn-primary mb-3">Tambah </a>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered no-wrap">
                            <thead>
                                <tr>
                                    <th>Gambar</th>
                                    <th>Kategori</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kategori as $item)
                                    <tr>
                                        <td> <img style="height: 40px; width:40px;" class="img-profile rounded-circle"
                                                src="{{ asset('storage/thumbnails/' . $item->thumbnail) }}" alt="">
                                        </td>
                                       <td>{{ $item->kategori }}</td>
                                        <td>
                                           
                                            <form action="{{ route('kategori.destroy', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn text-danger" type="submit"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus resep ini?')"><i class="fas fa-trash"></i></button>
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
