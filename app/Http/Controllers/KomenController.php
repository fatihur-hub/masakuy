<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Komen;
use App\Models\Resep; // Assuming you have a Resep model

class KomenController extends Controller
{
    // Menampilkan semua komen
    public function index()
    {
        $komens = Komen::all();
        return view('komen.index', ['komens' => $komens]);
    }

    // Menampilkan formulir untuk membuat komen baru
    public function create()
    {
        $reseps = Resep::all();
        return view('komen.create', ['reseps' => $reseps]);
    }

    // Menyimpan komen baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'id_user' => 'required',
            'id_resep' => 'required',
            'komen' => 'required',
        ]);

        Komen::create($request->all());

        return redirect()->route('komen.index')->with('success', 'Komen berhasil ditambahkan.');
    }

    // Menampilkan formulir untuk mengedit komen
    public function edit($id)
    {
        $komen = Komen::findOrFail($id);
        $reseps = Resep::all();
        return view('komen.edit', ['komen' => $komen, 'reseps' => $reseps]);
    }

    // Menyimpan perubahan pada komen ke database
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_user' => 'required',
            'id_resep' => 'required',
            'komen' => 'required',
        ]);

        $komen = Komen::findOrFail($id);
        $komen->update($request->all());

        return redirect()->route('komen.index')->with('success', 'Komen berhasil diperbarui.');
    }

    // Menghapus komen dari database
    public function destroy($id)
    {
        $komen = Komen::findOrFail($id);
        $komen->delete();

        return redirect()->route('komen.index')->with('success', 'Komen berhasil dihapus.');
    }
}
