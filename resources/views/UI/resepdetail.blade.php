@extends('ui.layout.app')
@section('content')
<section class="text-white py-4 py-xl-5">
    <div class="container">
        <div class="border rounded border-0 d-flex flex-column justify-content-center align-items-center p-4 py-5" style="background: linear-gradient(rgba(0,123,255,0.2), rgba(0,123,255,0.2)), url(&quot;{{asset('/storage/gambar/'.$resep->gambar)}}&quot;) no-repeat;height: 500px;border-radius: -2px;background-size: auto, cover;">
            <div class="row">
                <div class="col-md-10 col-xl-8 text-center d-flex d-sm-flex d-md-flex justify-content-center align-items-center mx-auto justify-content-md-start align-items-md-center justify-content-xl-center">
                    <div>
                        <h1 class="text-uppercase fw-bold mb-3">{{$resep->nama_resep}}</h1>
                        <p class="mb-4">{{$resep->asal_kota}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- End: Hero Overlay -->
<div class="container" style="margin-bottom: 21px;">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Bahan-Bahan</h4>
            <ul>
                <li>  {!!$resep->bahan !!}</li>
               
            </ul>
        </div>
    </div>
</div>
<div class="container" style="margin-bottom: 21px;">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Langkah</h4>
            <ul>
                <li>  {!!$resep->langkah !!}</li>
                
            </ul>
        </div>
    </div>
</div><!-- Start: Testimonials -->
<div class="container py-4 py-xl-5">
    <div class="row mb-5">
        <div class="col-md-8 col-xl-6 text-center mx-auto">
            <h2>Apa Kata Mereka?</h2>
        </div>
    </div>
    <div class="row gy-4 row-cols-1 row-cols-sm-2 row-cols-lg-3">
        <div class="col">
            <div>
                <p class="bg-body-tertiary border rounded border-0 p-4">Nisi sit justo faucibus nec ornare amet, tortor torquent. Blandit class dapibus, aliquet morbi.</p>
                <div class="d-flex align-items-md-center"><img class="rounded-circle flex-shrink-0 me-3 fit-cover" width="50" height="50" src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png">
                    <div>
                        <p class="fw-bold text-primary mb-0">John Smith</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div>
                <p class="bg-body-tertiary border rounded border-0 p-4">Nisi sit justo faucibus nec ornare amet, tortor torquent. Blandit class dapibus, aliquet morbi.</p>
                <div class="d-flex align-items-md-center"><img class="rounded-circle flex-shrink-0 me-3 fit-cover" width="50" height="50" src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png">
                    <div>
                        <p class="fw-bold text-primary mb-0">John Smith</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div>
                <p class="bg-body-tertiary border rounded border-0 p-4">Nisi sit justo faucibus nec ornare amet, tortor torquent. Blandit class dapibus, aliquet morbi.</p>
                <div class="d-flex align-items-md-center"><img class="rounded-circle flex-shrink-0 me-3 fit-cover" width="50" height="50" src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png">
                    <div>
                        <p class="fw-bold text-primary mb-0">John Smith</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- End: Testimonials -->
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Komentari</h4><textarea style="width: 100%;"></textarea><input class="btn btn-primary" type="submit">
        </div>
    </div>
</div><!-- Start: Footer Basic -->
@endsection