<?php

namespace App\Models;

use App\Models\barang;
use App\Models\Peminjaman;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Peminjaman extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function barang(){
        return $this->belongsTo(barang::class, 'barang_id','id');
    }
}
