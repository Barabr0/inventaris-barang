<?php

namespace App\Models;

use App\Models\barang;
use App\Models\kategori;
use App\Models\barang_masuk;
use App\Models\barang_keluar;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class barang extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function barang_masuk(){
        return $this->hasMany(barang_masuk::class, 'barang_id','id');
    }
    public function barang_keluar(){
        return $this->hasMany(barang_keluar::class, 'barang_id','id');
    }
    public function kategori(){
        return $this->belongsTo(kategori::class, 'kategori_id','id');
    }
    public function peminjaman(){
        return $this->hasOne(Peminjaman::class, 'peminjaman_id','id');
    }
}
