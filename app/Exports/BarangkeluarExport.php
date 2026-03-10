<?php

namespace App\Exports;

use App\Models\barang_keluar;
use Maatwebsite\Excel\Concerns\FromCollection;

class BarangkeluarExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return barang_keluar::all();
    }
}
