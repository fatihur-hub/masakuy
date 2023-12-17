<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Resep;
use App\Models\Kategori; // Assuming you have a Kategori model
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ResepController extends Controller
{
    // Menampilkan semua resep
    public function index()
    {
        $reseps = Resep::all();
        return view('resep.index', ['reseps' => $reseps]);
    }

    // Menampilkan formulir untuk membuat resep baru
    public function create()
    {   $user=User::all();
        $categories = Kategori::all();
        return view('resep.create', compact('user','categories'));
    }

    // Menyimpan resep baru ke database
    public function store(Request $request)
    {
        $request->validate([
        'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'nama_resep' => 'required',
        'asal_kota' => 'required',
        'id_kategori' => 'required',
        'durasi' => 'required|integer',
        'kesulitan' => 'required|in:mudah,menengah,sulit',
        'bahan' => 'required',
        'langkah' => 'required',
        
    ]);

    // Menyimpan gambar ke direktori penyimpanan (storage/app/public/gambar)
    $gambarPath = $request->file('gambar')->store('public/gambar');

    // Mengambil nama file gambar
    $gambarName = basename($gambarPath);

    // Menyimpan data resep ke database bersama dengan nama gambar
    $tes=Resep::create([
        'gambar' => $gambarName,
        'nama_resep' => $request->nama_resep,
        'id_user' => Auth::id(),
        'asal_kota' => $request->asal_kota,
        'id_kategori' => $request->id_kategori,
        'durasi' => $request->durasi,
        'kesulitan' => $request->kesulitan,
        'bahan' => $request->bahan,
        'langkah' => $request->langkah,
    ]);

    return redirect()->route('resep.index')->with('success', 'Resep berhasil ditambahkan.');
    }

    // Menampilkan detail resep
    public function show($id)
    {
        $resep = Resep::findOrFail($id);
        return view('resep.show', ['resep' => $resep]);
    }

    // Menampilkan formulir untuk mengedit resep
    public function edit($id)
    {
        $resep = Resep::findOrFail($id);
        $categories = Kategori::all();
        return view('resep.edit', ['resep' => $resep, 'categories' => $categories]);
    }

    // Menyimpan perubahan pada resep ke database
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_resep' => 'required',
            'asal_kota' => 'required',
            'id_kategori' => 'required',
            'durasi' => 'required|integer',
            'kesulitan' => 'required|in:mudah,menengah,sulit',
            'bahan' => 'required',
            'langkah' => 'required',
            'status' => 'boolean',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Add image validation
            // Add other validation rules for your fields
        ]);
    
        // Find the Resep model instance by ID
        $resep = Resep::findOrFail($id);
    
        // Delete the previous image if a new image is uploaded
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama dari penyimpanan
            Storage::delete('public/gambar/' . $resep->gambar);
        }
    
        // Update the Resep model with the validated data
        $resep->update([
            'nama_resep' => $request->nama_resep,
            'asal_kota' => $request->asal_kota,
            'id_kategori' => $request->id_kategori,
            'durasi' => $request->durasi,
            'kesulitan' => $request->kesulitan,
            'bahan' => $request->bahan,
            'langkah' => $request->langkah,
            'status' => $request->status,
            // Add other fields as needed
        ]);
    
        // Update the image if a new image is uploaded
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('public/gambar');
            $gambarName = basename($gambarPath);
            $resep->update(['gambar' => $gambarName]);
        }
    
        // Redirect the user to the index page with a success message
        return redirect()->route('resep.index')->with('success', 'Resep berhasil diperbarui.');
    }
    
   
    public function destroy($id)
    {
        $resep = Resep::findOrFail($id);

        // Hapus gambar dari penyimpanan sebelum menghapus data
        Storage::delete('public/gambar/' . $resep->gambar);
    
        // Hapus data resep
        $resep->delete();
    
        return redirect()->route('resep.index')->with('success', 'Resep berhasil dihapus.');
    }
}
