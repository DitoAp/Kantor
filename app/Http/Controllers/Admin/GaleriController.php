<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function index()
    {
        $galeris = Galeri::latest()->paginate(12);
        return view('admin.galeri.index', compact('galeris'));
    }

    public function create()
    {
        return view('admin.galeri.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string|max:500',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:3048'
        ]);

        $pathGambar = $request->file('gambar')->store('galeri', 'public');

        Galeri::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gambar' => $pathGambar
        ]);

        return redirect()->route('admin.galeri.index')->with('success', 'Foto dokumentasi berhasil ditambahkan ke album!');
    }

    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);
        if ($galeri->gambar) {
            Storage::disk('public')->delete($galeri->gambar);
        }
        $galeri->delete();

        return redirect()->route('admin.galeri.index')->with('success', 'Foto dokumentasi berhasil dihapus.');
    }
}