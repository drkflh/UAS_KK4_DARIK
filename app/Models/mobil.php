<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mobil extends Model
{
    use HasFactory;
    protected $fillable = ['nama_mobil','nopol_mobil','jenis_mobil','desk_mobil', 'tahun_mobil','status_mobil','harga_sewa_mobil','foto_mobil'];

}