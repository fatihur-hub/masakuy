<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ArtikelController extends Controller
{
    public function index()
    {
        $user = User::all();
        $artikel = Artikel::all();
        return view('artikel.index', compact('artikel', 'user'));
    }

    public function create()
    {
        return view('artikel.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'artikel' => 'required',
        ]);

        $gambarPath = $request->file('gambar')->store('public/gambar');
        $gambarName = basename($gambarPath);

        $artikel = Artikel::create([
            'judul' => $request->judul,
            'author' => auth()->id(),
            'gambar' => $gambarName,
            'artikel' => $request->artikel,
        ]);

        $artikel->slug = $this->generateSlug($artikel->judul);
        $artikel->save();

        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil ditambahkan.');
    }

    public function show($slug)
    {   $user=User::all();
        $artikel = Artikel::where('slug', $slug)->firstOrFail();
        return view('artikel.show', compact('artikel','user'));
    }

    public function edit($id)
    {
        $artikel = Artikel::findOrFail($id);
        return view('artikel.edit', ['artikel' => $artikel]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'gambar' => 'required',
            'artikel' => 'required',
            'status' => 'in:enable,disable',
        ]);

        $artikel = Artikel::findOrFail($id);
        $artikel->update($request->all());

        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $artikel = Artikel::findOrFail($id);
        $artikel->delete();

        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil dihapus.');
    }

    private function generateSlug($judul)
    {
        return Str::slug($judul);
    }
}
