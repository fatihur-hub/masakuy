@extends('UI.layout.app')
<!-- Start: Hero Carousel -->
@section('content')
        {{-- <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-xl-3" data-aos="fade-up">
            <div class="row mb-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <h2>Jelajahi Cita Rasa Nusantara</h2>
                    <p class="w-lg-50">Berbagai resep masakan nusantara yang bisa kamu coba</p>
                </div>
            </div>
            @foreach ($artikel as $item)
                <div class="col">
                    <div><img class="rounded img-fluid d-block w-100 fit-cover" style="height: 200px;"
                            src="{{ asset('storage/gambar/' . $item->gambar) }}" alt="{{ $item->nam_resep }}">
                        <div class="py-4"><span
                            <h4><strong>
                                
                                <a style="text-decoration: none"
                                        href="{{ url('resep/' . $item->slug) }}">{{ $item->judul }}</a>
                                    
                                </strong></h4>
                            <p>Author : {{ $item->artikel }}</p>
                            <p>Author : {{ $item->user->name }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
      

 --}}



    <div class="container py-4 py-xl-5">
        <div class="row mb-5">
            <div class="col-md-8 col-xl-6 text-center mx-auto">
                <h2>Artikel Masakan</h2>
                <p class="w-lg-50">artikel seputar masakan</p>
            </div>
        </div><!-- Start: Search Input Responsive with Icon -->
      
        <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-xl-3" data-aos="fade-up">
            @foreach ($artikel as $item)
                
            <div class="col">
                <div><img class="rounded img-fluid d-block w-100 fit-cover" style="height: 200px;" src="{{ asset('storage/gambar/' . $item->gambar) }}">
                    <div class="py-4"><span class="badge bg-primary">{{$item->user->name}}</span>
                        <a href="{{url('/artikel/'.$item->slug)}}"><h4><strong>{{$item->judul}}</strong> </h4></a>
                        <p>{!! Str::limit(strip_tags($item->artikel), 100) !!}</p>
                    </div>
                </div>
            </div>
            @endforeach
           
        </div>
        <nav>
       
        </nav>
        <div class="search-container"></div><!-- End: Search Field With Icon -->
    </div><!-- End: Resep -->

@endsection
