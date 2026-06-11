<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    // Kunci nama tabel agar Laravel tidak mencari 'galeris'
    protected $table = 'galeri';

    // Mengizinkan semua kolom diisi (mass assignment)
    protected $guarded = ['id'];
}