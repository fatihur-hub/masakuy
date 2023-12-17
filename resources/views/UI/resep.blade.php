@extends('UI.layout.app')
<!-- Start: Hero Carousel -->
@section('content')
    <div class="carousel slide mt-4" data-bs-ride="carousel" id="carousel-1" style="height: 600px;">
        <div class="carousel-inner h-100" style="color: var(--bs-body-bg);">
            <div class="carousel-item active h-100"><img class="w-100 d-block position-absolute h-100 fit-cover"
                    src="{{ asset('UI/assets/img/1.png') }}" alt="Slide Image"
                    style="z-index: -1;"><!-- Start: 1 Row 1 Column -->
                <div class="container d-flex flex-column justify-content-center h-100">
                    <div class="row">
                        <div class="col-md-6 col-xl-4 offset-md-2">
                            <div style="max-width: 350px;">
                                <h1 class="text-uppercase fw-bold">Masakuy!</h1>
                                <p class="my-3">Menyajikan resep nusantara dari sabang sampai merauke</p>
                            </div>
                        </div>
                    </div>
                </div><!-- End: 1 Row 1 Column -->
            </div>
            <div class="carousel-item h-100"><img class="w-100 d-block position-absolute h-100 fit-cover"
                    src="{{ asset('UI/assets/img/2.png') }}" alt="Slide Image"
                    style="z-index: -1;"><!-- Start: 1 Row 1 Column -->
                <div class="container d-flex flex-column justify-content-center h-100">
                    <div class="row">
                        <div class="col-md-6 col-xl-4 offset-md-2">
                            <div style="max-width: 350px;">
                                <h1 class="text-uppercase fw-bold">Citarasa Nusantara</h1>
                                <p class="my-3">Eksplorasi kelezatan dari tanah air tercinta</p>
                            </div>
                        </div>
                    </div>
                </div><!-- End: 1 Row 1 Column -->
            </div>
            <div class="carousel-item h-100"><img class="w-100 d-block position-absolute h-100 fit-cover"
                    src="{{ asset('UI/assets/img/3.png') }}" alt="Slide Image"
                    style="z-index: -1;"><!-- Start: 1 Row 1 Column -->
                <div class="container d-flex flex-column justify-content-center h-100">
                    <div class="row">
                        <div class="col-md-6 col-xl-4 offset-md-2">
                            <div style="max-width: 350px;">
                                <h1 class="text-uppercase fw-bold">Sajian Nusantara</h1>
                                <p class="my-3">Rasa tradisi dalam satu gigitan</p>
                            </div>
                        </div>
                    </div>
                </div><!-- End: 1 Row 1 Column -->
            </div>
        </div>
        <div>
            <!-- Start: Previous --><a class="carousel-control-prev" href="#carousel-1" role="button"
                data-bs-slide="prev"><span class="carousel-control-prev-icon"></span><span
                    class="visually-hidden">Previous</span></a><!-- End: Previous -->
            <!-- Start: Next --><a class="carousel-control-next" href="#carousel-1" role="button"
                data-bs-slide="next"><span class="carousel-control-next-icon"></span><span
                    class="visually-hidden">Next</span></a><!-- End: Next -->
        </div>
        <div class="carousel-indicators"><button type="button" data-bs-target="#carousel-1" data-bs-slide-to="0"
                class="active"></button> <button type="button" data-bs-target="#carousel-1" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#carousel-1" data-bs-slide-to="2"></button>
        </div>
    </div><!-- End: Hero Carousel -->
    <!-- Start: kategori -->
    <div class="container py-4 py-xl-5" data-aos="zoom-in">
        <div class="row mb-4 mb-lg-5">
            <div class="col-md-8 col-xl-6 text-center mx-auto">
                <h2>Kategori</h2>
            </div>
        </div>
        <div id="kategoriSlider" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($kategori->chunk(4) as $index => $chunk)
                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                        <div class="row gy-4 row-cols-2 row-cols-md-4">
                            @foreach ($chunk as $item)
                                <div class="col">
                                    <div class="card border-0 shadow-none">
                                        <div class="card-body text-center d-flex flex-column align-items-center p-0">
                                            <img class="rounded-circle mb-3 fit-cover" width="130" height="130"
                                                src="{{ asset('storage/thumbnails/' . $item->thumbnail) }}"
                                                alt="{{ $item->kategori }}">
                                            <h5 class="fw-bold text-primary card-title mb-0">
                                                <strong>{{ $item->kategori }}</strong>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        
            <button class="carousel-control-prev" type="button" data-bs-target="#kategoriSlider" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#kategoriSlider" data-bs-slide="next">
                <span class="carousel-control-next-icon text-primary" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        
    </div><!-- End: kategori -->
    <!-- Start: Resep -->
    <div class="container py-4 py-xl-5">
        <div class="row mb-5">
            <div class="col-md-8 col-xl-6 text-center mx-auto">
                <h2>Jelajahi Cita Rasa Nusantara</h2>
                <p class="w-lg-50">Berbagai resep masakan nusantara yang bisa kamu coba</p>
            </div>
        </div><!-- Start: Search Input Responsive with Icon -->
        <div class="row" style="margin-top: 2px;margin-bottom: 27px;">
            <div class="col-md-10 offset-md-1">
                <div class="card m-auto" style="max-width: 850px">
                    <div class="card-body">
                        <form action="{{ route('searchResep') }}" method="GET" class="d-flex align-items-center">
                            <i class="fas fa-search d-none d-sm-block h4 text-body m-0"></i>
                            <input class="form-control form-control-lg flex-shrink-1 form-control-borderless" 
                                   type="search" 
                                   placeholder="Mau Masak Apa Hari Ini?" 
                                   name="search">
                            <button class="btn btn-success btn-lg" 
                                    type="submit" 
                                    style="background: var(--swiper-theme-color); border-width: 0px;">
                                Cari
                            </button>
                        </form>
                    </div>
                </div>
                
            </div>
        </div><!-- End: Search Input Responsive with Icon -->
        <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-xl-3" data-aos="fade-up">

            @foreach ($resep as $item)
                <div class="col">
                    <div><img class="rounded img-fluid d-block w-100 fit-cover" style="height: 200px;"
                            src="{{ asset('storage/gambar/' . $item->gambar) }}" alt="{{ $item->nam_resep }}">
                        <div class="py-4"><span
                                class="badge bg-primary">{{ $item->kategori ? $item->kategori->kategori : 'No Category' }}</span><span
                                class="badge bg-info" style="margin-left: 7px;">{{ $item->kesulitan }}</span>
                            <h4><strong>
                                
                                <a style="text-decoration: none"
                                        href="{{ url('resep/' . $item->id) }}">{{ $item->nama_resep }}</a>
                                    
                                </strong> |
                                {{ $item->asal_kota }}</h4>
                            <p>Author : {{ $item->user->name }}</p>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>
        <nav>
            <ul class="pagination">
                {{ $resep->Links() }}
            </ul>
        </nav><!-- Start: Search Field With Icon -->
        <div class="search-container"></div><!-- End: Search Field With Icon -->
    </div><!-- End: Resep -->
    <!-- Start: CTA -->
    <section class="py-4 py-xl-5">
        <!-- Start: 1 Row 2 Columns -->
        <div class="container">
            <div class="bg-dark border rounded border-0 border-dark overflow-hidden">
                <div class="row g-0">
                    <div class="col-md-6">
                        <div class="text-white p-4 p-md-5">
                            <h2 class="fw-bold text-white mb-3">Ingin Resepmu Tampil?</h2>
                            <p class="mb-4">Ayok join bersama kami</p>
                            <div class="my-3"><a class="btn btn-primary btn-lg me-2" role="button"
                                    href="{{route('home')}}">Gabung sekarang</a></div>
                        </div>
                    </div>
                    <div class="col-md-6 order-first order-md-last" style="min-height: 250px;"><img
                            class="w-100 h-100 fit-cover" src="{{ asset('UI/assets/img/soto.jpg') }}"></div>
                </div>
            </div>
        </div><!-- End: 1 Row 2 Columns -->
    </section><!-- End: CTA -->
    <!-- Start: Team -->
    <div class="container py-4 py-xl-5">
        <div class="row mb-4 mb-lg-5">
            <div class="col-md-8 col-xl-6 text-center mx-auto">
                <h2>Our Team</h2>
                <p class="w-lg-50">kenali siapa saja orang dibalik ini</p>
            </div>
        </div>
        <div class="row gy-4 row-cols-2 row-cols-sm-2 row-cols-md-5 row-cols-lg-5 d-flex d-sm-flex justify-content-center justify-content-sm-center"
            data-aos="fade-right">
            <div class="col">
                <div class="card border-0 shadow-none">
                    <div class="card-body text-center d-flex flex-column align-items-center p-0"><img
                            class="rounded-circle mb-3 fit-cover" width="130" height="130"
                            src="{{ asset('UI/assets/img/fatih%20png.png') }}">
                        <h5 class="fw-bold text-primary card-title mb-0"><strong>Fatih</strong></h5>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border-0 shadow-none">
                    <div class="card-body text-center d-flex flex-column align-items-center p-0"><img
                            class="rounded-circle mb-3 fit-cover" width="130" height="130"
                            src="{{ asset('UI/assets/img/yonas.jpg') }}">
                        <h5 class="fw-bold text-primary card-title mb-0"><strong>Yonas</strong></h5>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border-0 shadow-none">
                    <div class="card-body text-center d-flex flex-column align-items-center p-0"><img
                            class="rounded-circle mb-3 fit-cover" width="130" height="130"
                            src="{{ asset('UI/assets/img/Rifqi.jpg') }}">
                        <h5 class="fw-bold text-primary card-title mb-0"><strong>Rifqi</strong></h5>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border-0 shadow-none">
                    <div class="card-body text-center d-flex flex-column align-items-center p-0"><img
                            class="rounded-circle mb-3 fit-cover" width="130" height="130"
                            src="{{ asset('UI/assets/img/zaiful.jpg') }}">
                        <h5 class="fw-bold text-primary card-title mb-0"><strong>Zaiful</strong></h5>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border-0 shadow-none">
                    <div class="card-body text-center d-flex flex-column align-items-center p-0"><img
                            class="rounded-circle mb-3 fit-cover" width="130" height="130"
                            src="{{ asset('UI/assets/img/arif.jpeg') }}">
                        <h5 class="fw-bold text-primary card-title mb-0"><strong>Arif</strong></h5>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- End: Team -->
@endsection
