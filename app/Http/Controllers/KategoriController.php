<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    // Menampilkan semua kategori
    public function index()
    {
        $kategori = Kategori::all();
        return view('kategori.index', ['kategori' => $kategori]);
    }

    // Menampilkan formulir untuk membuat kategori baru
    public function create()
    {
        return view('kategori.create');
    }

    // Menyimpan kategori baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required',
            'thumbnail' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Mengelola thumbnail
        $thumbnailPath = $request->file('thumbnail')->store('public/thumbnails');
        $thumbnailName = basename($thumbnailPath);

        // Simpan data kategori beserta nama thumbnail ke dalam database
        Kategori::create([
            'kategori' => $request->kategori,
            'thumbnail' => $thumbnailName,
        ]);

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    // Menampilkan detail kategori
    public function show($id)
    {
        $category = Kategori::findOrFail($id);
        return view('kategori.show', ['category' => $category]);
    }

    // Menampilkan formulir untuk mengedit kategori
    public function edit($id)
    {
        $category = Kategori::findOrFail($id);
        return view('kategori.edit', ['category' => $category]);
    }

    // Menyimpan perubahan pada kategori ke database
    public function update(Request $request, $id)
    {
        $request->validate([
            'kategori' => 'required|unique:kategori,kategori,' . $id
        ]);

        $category = Kategori::findOrFail($id);
        $category->update([
            'kategori' => $request->kategori
        ]);

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    // Menghapus kategori dari database
    public function destroy($id)
    {
        $category = Kategori::findOrFail($id);
        $category->delete();

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus.');
    }
}
