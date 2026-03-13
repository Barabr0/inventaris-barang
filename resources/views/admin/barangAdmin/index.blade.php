@extends('admin.layouts.admin')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h3 class="text-2xl font-bold text-primary">Daftar Inventaris Barang</h3>
            <p class="text-sm text-slate-500">Kelola stok dan informasi barang dalam gudang Anda.</p>
        </div>
    </div>


    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">

            <table class="w-full text-left">

                <thead>
                    <tr class="bg-slate-50 border-b border-slate-100 text-slate-500 uppercase text-[11px] font-bold tracking-widest">
                        <th class="px-6 py-4 text-center w-16">No</th>
                        <th class="px-6 py-4">Informasi Barang</th>
                        <th class="px-6 py-4">Kategori</th>
                        <th class="px-6 py-4 text-center">Stok</th>
                        <th class="px-6 py-4">Merk</th>
                        <th class="px-6 py-4">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100">

                @foreach ($barang as $b)
                <tr class="hover:bg-slate-50 transition-colors group">

                    <td class="px-6 py-4 text-center text-slate-500 font-medium">
                        {{ $loop->iteration }}
                    </td>

                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">

                            <div class="w-12 h-12 bg-background rounded-lg overflow-hidden border border-slate-100">
                                @if($b->foto)
                                    <img src="{{ asset('image/barang/'.$b->foto) }}"
                                         class="w-full h-full object-cover">
                                @else
                                    <div class="flex items-center justify-center h-full text-slate-400">
                                        <i class="fas fa-box"></i>
                                    </div>
                                @endif
                            </div>

                            <div>
                                <p class="font-bold text-primary group-hover:text-accent transition-colors">
                                    {{ $b->nama_barang }}
                                </p>

                                <p class="text-xs text-slate-400 font-mono uppercase tracking-tighter">
                                    {{ $b->merk }}
                                </p>
                            </div>

                        </div>
                    </td>

                    <td class="px-6 py-4 text-sm text-slate-600 font-medium">
                        {{ $b->kategori->nama_kategori ?? '-' }}
                    </td>

                    <td class="px-6 py-4 text-center">
                        <span class="bg-emerald-100 text-emerald-700 px-3 py-1 rounded-full text-xs font-bold border border-emerald-200">
                            {{ $b->stok }} Unit
                        </span>
                    </td>

                    <td class="px-6 py-4 text-sm text-slate-500">
                        {{ $b->merk }}
                    </td>
                    <td class="px-6 py-4 text-sm text-slate-500">
                        <form action="{{ route('barang.destroy', $b->id) }}" method="POST"
                            onsubmit="return confirm('Yakin hapus?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-700 transition-colors">
                          <i class="fa-solid fa-trash"></i>
                        </button>
                      </form>
                    </td>
                </tr>
                @endforeach

                </tbody>

            </table>

        </div>
    </div>
</div>
@endsection
