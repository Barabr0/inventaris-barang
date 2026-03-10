@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container-fluid flex-grow-1 container-p-y">

        @if (session('success'))
        <div id="alert-auto-close" class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if (session('error'))
        <div id="alert-auto-close-error" class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="card-header justify-content- align-items-center mb-10">
<a href="{{ route('peminjaman.export') }}" class="btn btn-success">
        <i class="bx bx-export"></i> Export Excel
    </a>

<a href="{{ route('peminjaman.pdf') }}" class="btn btn-danger">
        <i class="bx bx-export"></i> Export PDF
    </a>
</div>
        <div class="card mt-4">
            <div class="card-header d-flex justify-content-between align-items-center mb-10">
                <h5 class="card-title mb-0">Peminjaman</h5>
                <a href="{{ route('peminjaman.create') }}" class="btn btn-sm btn-primary">
                    <i class="bx bx-add-circle me-1"></i> Add
                </a>
            </div>

            <div class="table-responsive text-nowrap">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Peminjam</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @php $no = 1 @endphp
                        @forelse ($peminjaman as $a)
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
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a href="{{ route('peminjaman.edit', $a->id) }}" class="dropdown-item text-warning">
                                            <i class="bx bx-edit-alt me-1"></i> Edit
                                        </a>
                                        <a href="{{ route('peminjaman.show', $a->id) }}" class="dropdown-item text-dark">
                                            <i class="bx bx-show-alt me-1"></i> Show
                                        </a>
                                        <form action="{{ route('peminjaman.destroy', $a->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item text-danger">
                                                <i class="bx bx-trash me-1"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center">Data Peminjaman kosong</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const alerts = document.querySelectorAll('.alert-dismissible');
        alerts.forEach(function(alertElement) {
            setTimeout(function() {
                const bsAlert = new bootstrap.Alert(alertElement);
                bsAlert.close();
            }, 3000); // 3 detik
        });
    });
</script>
@endsection
