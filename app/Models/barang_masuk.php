<?php

namespace App\Models;

use App\Models\barang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class barang_masuk extends Model
{
    use HasFactory;
    protected $fillable = ['barang_id','jumlah','keterangan','tanggal'];

    public function barang(){
            return $this->belongsTo(barang::class, 'barang_id','id');
    }
}
