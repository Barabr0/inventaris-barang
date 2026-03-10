<?php

namespace App\Exports;

use App\Models\barang;
use Maatwebsite\Excel\Concerns\FromCollection;

class BarangsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return barang::all();
    }
}
