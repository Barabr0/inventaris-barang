<?php

namespace App\Http\Controllers;

use App\Exports\BarangkeluarExport;
use App\Models\barang_keluar;
use App\Models\barang;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class BarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangkeluar = barang_keluar::all();
        $barang = barang::all();
        return view('barangkeluar.index',compact('barangkeluar','barang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function export()
        {
            return Excel::download(new BarangkeluarExport, 'barang.xlsx');
        }
        public function exportPdf()
        {
            $barangkeluar = barang_keluar::all();

            $pdf = Pdf::loadView('barangkeluar.pdf', compact('barangkeluar'));

            return $pdf->stream('barangkeluar.pdf');
        }
    public function create()
    {
        $barang = barang::all();
        return view('barangkeluar.create',compact('barang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
    'barang_id'  => 'required|exists:barangs,id',
    'jumlah'     => 'required|integer|min:1',
    'keterangan' => 'required|string|max:255',
    'tanggal'    => 'required|date|before_or_equal:today',
]);

$barang = barang::findOrFail($request->barang_id);
$jumlahkeluar = $request->jumlah;

if ($barang->stok < $jumlahkeluar) {
    return back()->with('error', 'Stok tidak cukup');
}

$barang->stok -= $jumlahkeluar;
$barang->save();

barang_keluar::create([
    'barang_id'  => $barang->id,
    'jumlah'     => $jumlahkeluar,
    'keterangan' => $request->keterangan,
    'tanggal'    => $request->tanggal,
]);

return redirect()->route('barangkeluar.index')
                 ->with('success', 'Stok berhasil dikurangi');
    }

    /**
     * Display the specified resource.
     */
    public function show(barang_keluar $barangkeluar)
    {
    $barangkeluar->load('barang');
    return view('barangkeluar.show', compact('barangkeluar'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(barang_keluar $barangkeluar)
    {
        $barang = barang::all();
        return view('barangkeluar.edit',compact('barangkeluar','barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, barang_keluar $barangkeluar)
    {
        $request->validate([
            'barang_id'  => 'required|exists:barangs,id',
            'jumlah'     => 'required|integer|min:1',
            'keterangan' => 'required|string|max:255',
            'tanggal'    => 'required|date|before_or_equal:today',
        ]);

        $baranglama = barang::findOrFail($barangkeluar->barang_id);
        $barangbaru = barang::findOrFail($request->barang_id);

        $baranglama->stok += $barangkeluar->jumlah;
        $baranglama->save();
        if ($barangbaru->stok < $request->jumlah) {
            return back()->with('error','stok tidak cukup');
        }
        $barangbaru->stok -= $request->jumlah;
        $barangbaru->save();

        $barangkeluar->update([
        'barang_id'  => $request->barang_id,
        'jumlah'     => $request->jumlah,
        'keterangan' => $request->keterangan,
        'tanggal'    => $request->tanggal,
    ]);
    return redirect()->route('barangkeluar.index')
                 ->with('success', 'Stok berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(barang_keluar $barangkeluar)
    {
    $barang = Barang::findOrFail($barangkeluar->barang_id);

    $barang->stok += $barangkeluar->jumlah;
    $barang->save();

    $barangkeluar->delete();

    return redirect()->route('barangkeluar.index')
                     ->with('success', 'Data berhasil dihapus & stok dikembalikan');
    }
}
