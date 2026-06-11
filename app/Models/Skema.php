<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skema extends Model
{
    // Kunci nama tabel sesuai database
    protected $table = 'skemas';

    protected $guarded = ['id'];
}