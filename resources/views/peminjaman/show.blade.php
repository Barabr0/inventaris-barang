@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container-fluid flex-grow-1 container-p-y">

        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Peminjaman /</span> Detail Peminjaman
        </h4>

        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Detail Data Peminjaman</h5>
            </div>

            <div class="card-body">

                <div class="row mb-3">
                    <label class="col-sm-3 fw-bold">Nama Peminjam</label>
                    <div class="col-sm-9">
                        {{ $peminjaman->nama_peminjam }}
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-3 fw-bold">Barang</label>
                    <div class="col-sm-9">
                        {{ $peminjaman->barang->nama_barang ?? '-' }}
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-3 fw-bold">Jumlah</label>
                    <div class="col-sm-9">
                        {{ $peminjaman->jumlah }}
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-3 fw-bold">Tanggal Pinjam</label>
                    <div class="col-sm-9">
                        {{ $peminjaman->tanggal_pinjam }}
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-3 fw-bold">Tanggal Kembali</label>
                    <div class="col-sm-9">
                        {{ $peminjaman->tanggal_kembali ?? '-' }}
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-3 fw-bold">Status</label>
                    <div class="col-sm-9">
                        @if ($peminjaman->status == 'dipinjam')
                            <span class="badge bg-success">Dipinjam</span>
                        @else
                            <span class="badge bg-danger">Dikembalikan</span>
                        @endif
                    </div>
                </div>

                <div class="mt-4">
                    <a href="{{ route('peminjaman.index') }}" class="btn btn-secondary">
                        Kembali
                    </a>

                    <a href="{{ route('peminjaman.edit', $peminjaman->id) }}" class="btn btn-warning">
                        Edit
                    </a>
                </div>

            </div>
        </div>

    </div>
</div>
@endsection
