<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Kategori;
use App\Models\Resep;
use App\Models\User;
use Illuminate\Http\Request;

class UiController extends Controller
{
    public function indexResep()
    {
        $user = User::all();
        $kategori = Kategori::all();
        $resep = Resep::where('status', '1')->paginate(6);
        return view('ui.resep', compact('resep', 'kategori', 'user'));
    }
    public function showResep($id)
    {
        $resep = Resep::findOrFail($id);
        return view('ui.resepdetail', ['resep' => $resep]);
    }
    public function indexArtikel()
    {   $user = User::all();
        $artikel = Artikel::all();
        return view('ui.artikel',compact('artikel'));
    }
    public function showArtikel($slug)
    {
        $user = User::all();
        $artikel = Artikel::where('slug', $slug)->firstOrFail();
        return view('ui.artikeldetail', compact('artikel', 'user'));
    }
    public function searchResep(Request $request)
    { $user = User::all();
        $kategori = Kategori::all();
        if ($request->has('search')) {
            $resep = Resep::where('nama_resep', 'LIKE', '%' . $request->search . '%')->where('status', 1)->paginate(6);
            $resep->appends($request->only('search'));
        } else {
            $resep = Resep::paginate(6);
        }
        return view('ui.resep', compact('resep', 'kategori', 'user'));
    }
}
