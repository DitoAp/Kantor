<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Event;
use App\Models\Galeri;
use App\Models\Skema;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    /**
     * Halaman Beranda / Landing Page
     */
    public function home() {
        // Mengambil 3 berita berstatus publish dan 3 event terbaru untuk dipajang di beranda
        $berita = Berita::where('status', 'publish')->latest()->take(3)->get();
        $event = Event::latest()->take(3)->get();
        
        return view('home', compact('berita', 'event'));
    }

    /**
     * Halaman Profil / Tentang LSP
     */
    public function profil() {
        return view('profil');
    }

    /**
     * Halaman Daftar Skema Sertifikasi ( include Fitur Pencarian & Pagination )
     */
    public function skema(Request $request) {
        $search = $request->search;
        
        $skemas = Skema::where('status_aktif', true)
            ->when($search, function($query) use ($search) {
                return $query->where('nama_skema', 'like', "%$search%")
                             ->orWhere('kode_skema', 'like', "%$search%");
            })
            ->paginate(6); // Menampilkan 6 data per halaman
            
        return view('skema', compact('skemas'));
    }

    /**
     * Halaman Daftar Berita Publik ( include Fitur Pencarian & Pagination )
     */
    public function berita(Request $request) {
        $search = $request->search;
        
        $beritas = Berita::where('status', 'publish')
            ->when($search, function($query) use ($search) {
                return $query->where('judul', 'like', "%$search%");
            })
            ->latest()
            ->paginate(6); // Menampilkan 6 berita per halaman
            
        return view('berita', compact('beritas'));
    }

    /**
     * Halaman Detail Berita Berdasarkan Slug
     */
    public function beritaDetail($slug) {
        $berita = Berita::where('slug', $slug)->where('status', 'publish')->firstOrFail();
        return view('berita-detail', compact('berita'));
    }

    /**
     * Halaman Daftar Event / Agenda
     */
    public function event() {
        $events = Event::latest()->paginate(6); // Menampilkan 6 event per halaman
        return view('event', compact('events'));
    }

    /**
     * Halaman Detail Event Berdasarkan Slug
     */
    public function eventDetail($slug) {
        $event = Event::where('slug', $slug)->firstOrFail();
        return view('event-detail', compact('event'));
    }

    /**
     * Halaman Galeri Foto
     */
    public function galeri() {
        $galeris = Galeri::latest()->paginate(9); // Menampilkan 9 foto per halaman (grid 3x3)
        return view('galeri', compact('galeris'));
    }

    /**
     * Halaman Kontak
     */
    public function kontak() {
        return view('kontak');
    }
}