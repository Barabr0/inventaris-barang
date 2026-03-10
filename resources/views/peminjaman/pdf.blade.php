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

<h2>Report Barang Keluar</h2>

<table>
    <thead>
        <tr>
             <th>No</th>
              <th>Nama Peminjam</th>
              <th>Nama Barang</th>
              <th>Jumlah</th>
              <th>Tanggal Pinjam</th>
              <th>Tanggal Kembali</th>
              <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @php $no = 1; @endphp
        @foreach ($peminjaman as $a)
        <tr>
               <td>{{ $no++ }}</td>
                            <td>{{ $a->nama_peminjam }}</td>
                            <td>{{ $a->barang->nama_barang }}</td>
                            <td>{{ $a->jumlah }}</td>
                            <td>{{ $a->tanggal_pinjam }}</td>
                            <td>{{ $a->tanggal_kembali }}</td>
                            <td>
                @if ($a->status == 'dipinjam')
                    <span class="badge bg-label-success">Dipinjam</span>
                @else
                    <span class="badge bg-label-danger">Dikembalikan</span>
                @endif
                            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
