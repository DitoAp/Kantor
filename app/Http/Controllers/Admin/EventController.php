<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::latest()->paginate(10);
        return view('admin.event.index', compact('events'));
    }

    public function create()
    {
        return view('admin.event.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_event' => 'required|string|max:255',
            'deskripsi' => 'required',
            'tanggal_pelaksanaan' => 'required|date',
            'lokasi' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $pathGambar = null;
        if ($request->hasFile('gambar')) {
            $pathGambar = $request->file('gambar')->store('event', 'public');
        }

        Event::create([
            'nama_event' => $request->nama_event,
            'slug' => Str::slug($request->nama_event) . '-' . rand(100, 999),
            'deskripsi' => $request->deskripsi,
            'tanggal_pelaksanaan' => $request->tanggal_pelaksanaan,
            'lokasi' => $request->lokasi,
            'gambar' => $pathGambar,
        ]);

        return redirect()->route('admin.event.index')->with('success', 'Agenda Event baru berhasil dijadwalkan!');
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('admin.event.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        $request->validate([
            'nama_event' => 'required|string|max:255',
            'deskripsi' => 'required',
            'tanggal_pelaksanaan' => 'required|date',
            'lokasi' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $pathGambar = $event->gambar;
        if ($request->hasFile('gambar')) {
            if ($event->gambar) {
                Storage::disk('public')->delete($event->gambar);
            }
            $pathGambar = $request->file('gambar')->store('event', 'public');
        }

        $event->update([
            'nama_event' => $request->nama_event,
            'slug' => Str::slug($request->nama_event) . '-' . rand(100, 999),
            'deskripsi' => $request->deskripsi,
            'tanggal_pelaksanaan' => $request->tanggal_pelaksanaan,
            'lokasi' => $request->lokasi,
            'gambar' => $pathGambar,
        ]);

        return redirect()->route('admin.event.index')->with('success', 'Data Agenda Event berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        if ($event->gambar) {
            Storage::disk('public')->delete($event->gambar);
        }
        $event->delete();

        return redirect()->route('admin.event.index')->with('success', 'Agenda Event berhasil dihapus dari kalender.');
    }
}