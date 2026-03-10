<?php

namespace App\Http\Controllers;

use App\Exports\BarangsExport;
use App\Models\barang;
use App\Models\kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;


class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $barang = barang::all();
        $kategori = kategori::all();
        return view('barang.index', compact('barang','kategori'));
        }

        /**
         * Show the form for creating a new resource.
        */
        public function export()
        {
            return Excel::download(new BarangsExport, 'barang.xlsx');
        }
        public function exportPdf()
        {
            $barang = barang::all();

            $pdf = Pdf::loadView('barang.pdf', compact('barang'));

            return $pdf->stream('barang.pdf');
        }
        public function create()
        {
            $kategori = kategori::all();
            return view('barang.create', compact('kategori'));
            }

            /**
             * Store a newly created resource in storage.
            */
            public function store(Request $request)
            {
                $validated = $request->validate([
            'nama_barang' => 'required|string|max:225',
            'stok' => 'nullable|integer|max:225',
            'merk' => 'required|string|max:225',
            'kategori_id' => 'required|exists:kategoris,id',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ],
        [
            'nama_barang.required' => 'Nama barang wajib diisi.',
            'nama_barang.string' => 'Nama barang harus berupa teks.',
            'nama_barang.max' => 'Nama barang tidak boleh lebih dari 225 karakter.',
            'stok.integer' => 'Stok harus berupa angka.',
            'stok.max' => 'Stok tidak boleh lebih dari 225.',
            'merk.required' => 'Merk wajib diisi.',
            'merk.string' => 'Merk harus berupa teks.',
            'merk.max' => 'Merk tidak boleh lebih dari 225 karakter.',
            'kategori_id.required' => 'Kategori wajib dipilih.',
            'kategori_id.exists' => 'Kategori yang dipilih tidak valid.',
            'foto.image' => 'Foto harus berupa file gambar.',
            'foto.mimes' => 'Foto harus berformat jpg, jpeg, atau png.',
            'foto.max' => 'Foto tidak boleh lebih dari 2048 KB.',
        ]
        );
         if ($request->hasFile('foto')) {

        $path = public_path('image/barang');

        if (!File::exists($path)) {
            File::makeDirectory($path, 0755, true);
        }

        $foto = $request->file('foto');
        $namafoto = time().'_'.Str::random(10).'.'.$foto->getClientOriginalExtension();
        $foto->move($path, $namafoto);

        $validated['foto'] = $namafoto;

    } else {

        $validated['foto'] = 'default.png';
    }

    Barang::create($validated);

    return redirect()
        ->route('barang.index')
        ->with('success', 'Barang berhasil ditambahkan');
}


    /**
     * Display the specified resource.
     */
    public function show(barang $barang)
    {
        $kategori = kategori::all();

        return view('barang.show', compact('barang', 'kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $barang = barang::findOrFail($id);
        $kategori = kategori::all();

        return view('barang.edit', compact('barang', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, barang $barang)
    {
      $validated = $request->validate([
        'nama_barang' => 'required|string|max:225',
        'stok' => 'nullable|integer',
        'merk' => 'required|string|max:225',
        'kategori_id' => 'required|exists:kategoris,id',
        'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]
    ,
    [
        'nama_barang.required' => 'Nama barang wajib diisi.',
        'nama_barang.string' => 'Nama barang harus berupa teks.',
        'nama_barang.max' => 'Nama barang tidak boleh lebih dari 225 karakter.',
        'stok.integer' => 'Stok harus berupa angka.',
        'stok.max' => 'Stok tidak boleh lebih dari 225.',
        'merk.required' => 'Merk wajib diisi.',
        'merk.string' => 'Merk harus berupa teks.',
        'merk.max' => 'Merk tidak boleh lebih dari 225 karakter.',
        'kategori_id.required' => 'Kategori wajib dipilih.',
        'kategori_id.exists' => 'Kategori yang dipilih tidak valid.',
        'foto.image' => 'Foto harus berupa file gambar.',
        'foto.mimes' => 'Foto harus berformat jpg, jpeg, atau png.',
        'foto.max' => 'Foto tidak boleh lebih dari 2048 KB.',
    ]
    );

    if ($request->hasFile('foto')) {
        $path = public_path('image/barang');

        if ($barang->foto && File::exists($path.'/'.$barang->foto)) {
            File::delete($path.'/'.$barang->foto);
        }

        if (!File::exists($path)) {
            File::makeDirectory($path, 0755, true);
        }

        $foto = $request->file('foto');
        $namafoto = time().'_'.Str::random(10).'.'.$foto->getClientOriginalExtension();
        $foto->move($path, $namafoto);

        $validated['foto'] = $namafoto;
    }

    $barang->update($validated);

    return redirect()->route('barang.index')->with('success','Barang berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(barang $barang)
    {
         $path = public_path('image/barang');

    if ($barang->foto && $barang->foto !== 'default.png') {
        if (File::exists($path.'/'.$barang->foto)) {
            File::delete($path.'/'.$barang->foto);
        }
    }

    $barang->delete();

    return redirect()
        ->route('barang.index')
        ->with('success', 'Barang berhasil dihapus');
    }
}
