<?php

namespace App\Exports;

use App\Models\barang_masuk;
use Maatwebsite\Excel\Concerns\FromCollection;

class BarangmasukExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return barang_masuk::all();
    }
}
