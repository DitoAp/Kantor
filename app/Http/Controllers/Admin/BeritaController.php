<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::latest()->paginate(10);
        return view('admin.berita.index', compact('beritas'));
    }

    public function create()
    {
        return view('admin.berita.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required|in:publish,draft'
        ]);

        $pathGambar = null;
        if ($request->hasFile('gambar')) {
            $pathGambar = $request->file('gambar')->store('berita', 'public');
        }

        Berita::create([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul) . '-' . rand(100, 999),
            'konten' => $request->konten,
            'gambar' => $pathGambar,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diterbitkan!');
    }

    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        return view('admin.berita.edit', compact('berita'));
    }

    public function update(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required|in:publish,draft'
        ]);

        $pathGambar = $berita->gambar;
        if ($request->hasFile('gambar')) {
            if ($berita->gambar) {
                Storage::disk('public')->delete($berita->gambar);
            }
            $pathGambar = $request->file('gambar')->store('berita', 'public');
        }

        $berita->update([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul) . '-' . rand(100, 999),
            'konten' => $request->konten,
            'gambar' => $pathGambar,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        if ($berita->gambar) {
            Storage::disk('public')->delete($berita->gambar);
        }
        $berita->delete();

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dihapus secara permanen.');
    }
}