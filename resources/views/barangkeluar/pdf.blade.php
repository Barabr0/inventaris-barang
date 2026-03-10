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
              <th>Nama</th>
              <th>Jumlah</th>
              <th>Keterangan</th>
              <th>Tanggal</th>
        </tr>
    </thead>
    <tbody>
        @php $no = 1; @endphp
        @foreach ($barangkeluar as $a)
        <tr>
            <td>{{ $no++ }}</td>
                <td>{{ $a->barang->nama_barang ?? '-' }}</td>
                <td>{{ $a->jumlah }}</td>
                <td>{{ $a->keterangan }}</td>
                <td>{{ $a->tanggal }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
