<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    // Tambahkan baris ini untuk mengunci nama tabel
    protected $table = 'berita'; 

    protected $guarded = ['id'];
}