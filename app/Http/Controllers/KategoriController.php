<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        return view('kategori.index', compact('kategori'));
    }

    public function create()
    {
        return view('kategori.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|string|max:225',
            'deskripsi' => 'nullable|string',
        ]);

        Kategori::create($validated);

        return redirect()
            ->route('kategori.index')
            ->with('success', 'Kategori berhasil ditambahkan');
    }

    public function show(Kategori $kategori)
    {
        return view('kategori.show', compact('kategori'));
    }
    public function edit(Kategori $kategori)
    {
        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, Kategori $kategori)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|string|max:225',
            'deskripsi' => 'nullable|string',
        ]);

        $kategori->update($validated);

        return redirect()
            ->route('kategori.index')
            ->with('success', 'Kategori berhasil di edit');
    }

    public function destroy(Kategori $kategori)
    {
        if($kategori->barang()->count() > 0){
            return redirect()->back()->with('error','data ini ada di barang!');
        }
        $kategori->delete();

        return redirect()
            ->route('kategori.index')
            ->with('success', 'Kategori berhasil di hapus');
    }
}
