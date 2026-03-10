<?php

namespace App\Models;

use App\Models\barang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class kategori extends Model
{
    use HasFactory;

    protected $fillable = ['nama_kategori','deskripsi'];

    public function barang(){
        return $this->hasMany(barang::class, 'kategori_id','id');
    }
}
