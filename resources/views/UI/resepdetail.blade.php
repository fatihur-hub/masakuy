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
<div class="container">
   
</div><!-- Start: Footer Basic -->
@endsection