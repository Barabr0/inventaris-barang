@extends('admin.layouts.admin')

@section('content')

<div class="space-y-6">

<div>
<h3 class="text-2xl font-bold text-primary">User</h3>
<p class="text-sm text-slate-500">Data pengguna sistem</p>
</div>

<div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">

<div class="overflow-x-auto">
<table class="w-full text-left">

<thead>
<tr class="bg-slate-50 text-xs uppercase text-slate-500">

<th class="px-6 py-4 text-center">No</th>
<th class="px-6 py-4">Nama</th>
<th class="px-6 py-4">Email</th>
<th class="px-6 py-4">Role</th>
<th class="px-6 py-4">Aksi</th>

</tr>
</thead>

<tbody class="divide-y divide-slate-100">

@foreach($user as $data)

<tr class="hover:bg-slate-50">

<td class="px-6 py-4 text-center">
{{ $loop->iteration }}
</td>

<td class="px-6 py-4 font-medium">
{{ $data->name }}
</td>

<td class="px-6 py-4">
{{ $data->email }}
</td>

<td class="px-6 py-4">
{{ $data->role }}
</td>
<td class="px-6 py-4 text-sm text-slate-500">
                        <form action="{{ route('admin.user.destroy', $data->id) }}" method="POST"
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
