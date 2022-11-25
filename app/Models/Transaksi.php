<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $fillable = ['nama','email','alamat','no_hp','nik','lok_antar','jam_antar','lok_balik','jam_balik','id_mobil','nama_mobil','nopol_mobil','harga_sewa_mobil'];
}
