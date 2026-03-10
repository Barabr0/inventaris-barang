<!DOCTYPE html>
<html>
<head>
    <title>Report PDF</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>

<h2>Report Barang</h2>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Stok</th>
            <th>Merk</th>
            <th>Kategori</th>
            <th>Foto</th>
        </tr>
    </thead>
    <tbody>
        @php $no = 1; @endphp
        @foreach ($barang as $b)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $b->nama_barang }}</td>
            <td>{{ $b->stok }}</td>
            <td>{{ $b->merk }}</td>
            <td>{{ $b->kategori->nama_kategori ?? '-' }}</td>\
             <td>
                  @if ($b->foto)
                    <img src="{{ public_path('image/barang/' . $b->foto) }}"
                         width="80"
                         class="rounded">
                  @else
                    <span class="text-muted">Tidak ada foto</span>
                  @endif
                </td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
