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

   <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

    <!-- Barang Terbaru -->
    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        <div class="p-6 border-b border-gray-100 font-bold text-gray-800">
            Barang Terbaru
        </div>

        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 text-gray-400 text-sm uppercase">
                    <th class="p-4 font-medium">Nama Barang</th>
                    <th class="p-4 font-medium">Status</th>
                    <th class="p-4 font-medium">Waktu</th>
                </tr>
            </thead>

            <tbody class="text-gray-600">
                @foreach($baranglatest as $item)
                <tr class="border-b border-gray-50 hover:bg-gray-50 transition">
                    <td class="p-4">{{ $item->nama_barang }} {{ $item->merk }}</td>

                    <td class="p-4">
                        <span class="px-2 py-1 bg-green-100 text-green-700 rounded text-xs">
                            Ditambahkan
                        </span>
                    </td>

                    <td class="p-4 text-sm text-gray-400">
                        {{ $item->created_at->diffForHumans() }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <!-- User Terbaru -->
    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        <div class="p-6 border-b border-gray-100 font-bold text-gray-800">
            User Terbaru
        </div>

        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 text-gray-400 text-sm uppercase">
                    <th class="p-4 font-medium">Nama User</th>
                    <th class="p-4 font-medium w-32">Status</th>
                    <th class="p-4 font-medium">Waktu</th>
                </tr>
            </thead>

            <tbody class="text-gray-600">
                @foreach($userlatest as $user)
                <tr class="border-b border-gray-50 hover:bg-gray-50 transition">
                    <td class="p-4">{{ $user->name }}</td>

                    <td class="p-4">
                        <span class="px-2 py-1 bg-blue-100 text-blue-700 rounded text-xs">
                            User Baru
                        </span>
                    </td>

                    <td class="p-4 text-sm text-gray-400">
                        {{ $user->created_at->diffForHumans() }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection
