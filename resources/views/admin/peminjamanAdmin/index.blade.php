@extends('admin.layouts.admin')

@section('content')

<div class="space-y-6">

<div>
<h3 class="text-2xl font-bold text-primary">Peminjaman</h3>
<p class="text-sm text-slate-500">Data peminjaman barang</p>
</div>

<div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">

<div class="overflow-x-auto">
<table class="w-full text-left">

<thead>
<tr class="bg-slate-50 text-xs uppercase text-slate-500">

<th class="px-6 py-4 text-center">No</th>
<th class="px-6 py-4">Nama Peminjam</th>
<th class="px-6 py-4">Barang</th>
<th class="px-6 py-4">Jumlah</th>
<th class="px-6 py-4">Tanggal Pinjam</th>

</tr>
</thead>

<tbody class="divide-y divide-slate-100">

@foreach($peminjaman as $data)

<tr class="hover:bg-slate-50">

<td class="px-6 py-4 text-center">
{{ $loop->iteration }}
</td>

<td class="px-6 py-4 font-medium">
{{ $data->nama_peminjam }}
</td>

<td class="px-6 py-4">
{{ $data->barang->nama_barang }}
</td>

<td class="px-6 py-4">
{{ $data->jumlah }}
</td>

<td class="px-6 py-4 text-slate-500">
{{ $data->tanggal_pinjam }}
</td>

</tr>

@endforeach

</tbody>

</table>
</div>

</div>
</div>

@endsection