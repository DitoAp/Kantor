<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skema;
use Illuminate\Http\Request;

class SkemaController extends Controller
{
    public function index()
    {
        $skemas = Skema::latest()->paginate(10);
        return view('admin.skema.index', compact('skemas'));
    }

    public function create()
    {
        return view('admin.skema.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_skema' => 'required|string|max:50|unique:skemas,kode_skema',
            'nama_skema' => 'required|string|max:255',
            'jenis' => 'required|string|max:100',
            'jumlah_unit' => 'required|integer|min:1',
            'status_aktif' => 'required|boolean'
        ]);

        Skema::create($request->all());

        return redirect()->route('admin.skema.index')->with('success', 'Skema sertifikasi baru berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $skema = Skema::findOrFail($id);
        return view('admin.skema.edit', compact('skema'));
    }

    public function update(Request $request, $id)
    {
        $skema = Skema::findOrFail($id);

        $request->validate([
            'kode_skema' => 'required|string|max:50|unique:skemas,kode_skema,' . $skema->id,
            'nama_skema' => 'required|string|max:255',
            'jenis' => 'required|string|max:100',
            'jumlah_unit' => 'required|integer|min:1',
            'status_aktif' => 'required|boolean'
        ]);

        $skema->update($request->all());

        return redirect()->route('admin.skema.index')->with('success', 'Data skema sertifikasi berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $skema = Skema::findOrFail($id);
        $skema->delete();

        return redirect()->route('admin.skema.index')->with('success', 'Skema sertifikasi berhasil dihapus dari sistem.');
    }
}