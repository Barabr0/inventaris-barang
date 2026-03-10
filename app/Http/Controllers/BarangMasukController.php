<?php

namespace App\Http\Controllers;

use App\Exports\BarangmasukExport;
use App\Models\barang_masuk;
use App\Models\barang;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class BarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barang_masuk = barang_masuk::all();
        $barang = barang::all();
        return view('barangmasuk.index',compact('barang_masuk','barang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function export()
        {
            return Excel::download(new BarangmasukExport, 'barang.xlsx');
        }
        public function exportPdf()
        {
            $barangmasuk = barang_masuk::all();

            $pdf = Pdf::loadView('barangmasuk.pdf', compact('barangmasuk'));

            return $pdf->stream('barangmasuk.pdf');
        }
    public function create()
    {
        $barang = barang::all();
        return view('barangmasuk.create', compact('barang'));
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

    DB::transaction(function () use ($request) {

        barang_masuk::create([
            'barang_id'  => $request->barang_id,
            'jumlah'     => $request->jumlah,
            'keterangan' => $request->keterangan,
            'tanggal'    => $request->tanggal,
        ]);

        $barang = barang::findOrFail($request->barang_id);
        $barang->increment('stok', $request->jumlah);

    });

    return redirect()->route('barangmasuk.index')
        ->with('success', 'Barang berhasil ditambahkan dan masuk stok');
}


    /**
     * Display the specified resource.
     */
    public function show(barang_masuk $barangmasuk)
    {
        $barangmasuk->load('barang');
    return view('barangmasuk.show', compact('barangmasuk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(barang_masuk $barangmasuk)
    {
    $barang = barang::all();
    return view('barangmasuk.edit', compact('barangmasuk','barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, barang_masuk $barangmasuk)
    {
         $request->validate([
         'barang_id'  => 'required|exists:barangs,id',
        'jumlah'     => 'required|integer|min:1',
        'keterangan' => 'required|string|max:255',
        'tanggal'    => 'required|date|before_or_equal:today',
    ]);
         DB::transaction(function () use ($request, $barangmasuk) {

        $barang = barang::find($barangmasuk->barang_id);
        if ($barang) {
            $barang->stok -= $barangmasuk->jumlah;
            $barang->save();
        }

        $barangmasuk->update([
            'barang_id'  => $request->barang_id,
            'jumlah'     => $request->jumlah,
            'keterangan' => $request->keterangan,
            'tanggal'    => $request->tanggal,
        ]);

        $barangBaru = barang::find($request->barang_id);
        if ($barangBaru) {
            $barangBaru->stok += $request->jumlah;
            $barangBaru->save();
        }
    });


    return redirect()
        ->route('barangmasuk.index')
        ->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(barang_masuk $barangmasuk)
    {
      DB::transaction(function () use ($barangmasuk) {

        $barang = barang::find($barangmasuk->barang_id);

        if ($barang) {
            $barang->stok -= $barangmasuk->jumlah;
            $barang->save();
        }

        $barangmasuk->delete();
    });

    return redirect()
        ->route('barangmasuk.index')
        ->with('success', 'Barang masuk berhasil dihapus dan stok dikembalikan');
    }
}
