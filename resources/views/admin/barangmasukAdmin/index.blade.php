@extends('admin.layouts.admin')

@section('content')
<div class="space-y-6">

<div class="flex justify-between items-center">
    <div>
        <h3 class="text-2xl font-bold text-primary">Barang Masuk</h3>
        <p class="text-sm text-slate-500">Data barang yang masuk ke gudang</p>
    </div>
</div>

<div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">

<div class="overflow-x-auto">
<table class="w-full text-left">

<thead>
<tr class="bg-slate-50 text-xs uppercase text-slate-500">
<th class="px-6 py-4 text-center">No</th>
<th class="px-6 py-4">Barang</th>
<th class="px-6 py-4">Jumlah</th>
<th class="px-6 py-4">Tanggal</th>
</tr>
</thead>

<tbody class="divide-y divide-slate-100">

@foreach($barangmasuk as $data)

<tr class="hover:bg-slate-50">
<td class="px-6 py-4 text-center">
{{ $loop->iteration }}
</td>

<td class="px-6 py-4 font-medium">
{{ $data->barang->nama_barang }}
</td>

<td class="px-6 py-4">
<span class="bg-emerald-100 text-emerald-700 px-3 py-1 rounded-full text-xs font-semibold">
{{ $data->jumlah }}
</span>
</td>

<td class="px-6 py-4 text-slate-500">
{{ $data->tanggal }}
</td>

</tr>

@endforeach

</tbody>

</table>
</div>

</div>
</div>
@endsection