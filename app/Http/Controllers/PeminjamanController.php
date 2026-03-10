<?php

namespace App\Http\Controllers;

use App\Exports\PeminjamanExport;
use App\Models\barang;
use App\Models\Peminjaman;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peminjaman = Peminjaman::all();
        $barang = barang::all();
        return view('peminjaman.index', compact('peminjaman','barang'));
        }

        /**
         * Show the form for creating a new resource.
        */
        public function export()
        {
            return Excel::download(new PeminjamanExport, 'barang.xlsx');
        }
        public function exportPdf()
        {
            $peminjaman = Peminjaman::all();

            $pdf = Pdf::loadView('peminjaman.pdf', compact('peminjaman'));

            return $pdf->stream('Peminjaman.pdf');
        }
        public function create()
        {
        $barang = barang::all();
        return view('peminjaman.create', compact('barang'));
        }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'nama_peminjam' => 'required|string|max:225',
        'barang_id' => 'required|exists:barangs,id',
        'jumlah' => 'required|integer|min:1',
        'tanggal_pinjam' => 'required|date',
        'tanggal_kembali' => 'nullable|date|after_or_equal:tanggal_pinjam',
        'status' => 'required|in:dipinjam,dikembalikan',
    ]);

    $barang = barang::findOrFail($request->barang_id);

    if ($request->jumlah > $barang->stok) {
        return back()
            ->withErrors(['jumlah' => 'Stok tidak mencukupi!'])
            ->withInput();
    }

    if ($request->status == 'dipinjam') {
        $barang->save();
    }

    Peminjaman::create($validated);

    return redirect()
        ->route('peminjaman.index')
        ->with('success', 'Data peminjaman berhasil ditambahkan.');
}

    /**
     * Display the specified resource.
     */
    public function show(Peminjaman $peminjaman)
    {
        $barang = barang::all();
        return view('peminjaman.show', compact('peminjaman', 'barang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Peminjaman $peminjaman)
    {
        $barang = barang::all();
        return view('peminjaman.edit', compact('peminjaman', 'barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Peminjaman $peminjaman)
        {
            $validated = $request->validate([
                'nama_peminjam' => 'required|string|max:225',
                'barang_id' => 'required|exists:barangs,id',
                'jumlah' => 'required|integer|min:1',
                'tanggal_pinjam' => 'required|date',
                'tanggal_kembali' => 'nullable|date|after_or_equal:tanggal_pinjam',
                'status' => 'required|in:dipinjam,dikembalikan',
            ]);

            $barang = barang::findOrFail($request->barang_id);

            if ($request->status == 'dipinjam' &&
                $request->jumlah > $barang->stok) {
                return back()
                    ->withErrors(['jumlah' => 'Stok tidak mencukupi!'])
                    ->withInput();
            }
            $barang->save();

            $peminjaman->update($validated);

            return redirect()
                ->route('peminjaman.index')
                ->with('success', 'Data peminjaman berhasil diperbarui.');
        }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Peminjaman $peminjaman)
    {
        if ($peminjaman->status == 'dipinjam') {
            $barang = barang::findOrFail($peminjaman->barang_id);
            $barang->save();
        }

        $peminjaman->delete();

        return redirect()
            ->route('peminjaman.index')
            ->with('success', 'Data peminjaman berhasil dihapus.');
    }
}
