@extends('admin.layouts.admin')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-blue-500">
            <div class="flex items-center">
                <div class="p-3 bg-blue-100 rounded-full text-blue-600 mr-4">
                    <i class="fas fa-users fa-2x"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-500 uppercase">Total Pengguna</p>
                    <p>{{$usercount}}</p>
                </div>
            </div>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-green-500">
            <div class="flex items-center">
                <div class="p-3 bg-green-100 rounded-full text-green-600 mr-4">
                    <i class="fas fa-shopping-cart fa-2x"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-500 uppercase">Barang</p>
                    <p>{{$barangcount}}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        <div class="p-6 border-b border-gray-100 font-bold text-gray-800">
            Aktivitas Terbaru
        </div>
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 text-gray-400 text-sm uppercase">
                    <th class="p-4 font-medium">Barang</th>
                    <th class="p-4 font-medium">Waktu</th>
                    <th class="p-4 font-medium">Status</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 italic">
                <tr class="border-b border-gray-50 hover:bg-gray-50 transition">
                    <td class="p-4">Budi Santoso</td>
                    <td class="p-4">2 menit yang lalu</td>
                    <td class="p-4"><span class="px-2 py-1 bg-green-100 text-green-700 rounded text-xs">Sukses</span></td>
                </tr>
                <tr class="border-b border-gray-50 hover:bg-gray-50 transition">
                    <td class="p-4">Siti Aminah</td>
                    <td class="p-4">1 jam yang lalu</td>
                    <td class="p-4"><span class="px-2 py-1 bg-blue-100 text-blue-700 rounded text-xs">Proses</span></td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
