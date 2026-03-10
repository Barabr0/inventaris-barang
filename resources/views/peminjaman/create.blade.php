@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container-fluid flex-grow-1 container-p-y">

        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Forms /</span> Tambah Peminjaman
        </h4>

        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show">
            <strong>Terjadi kesalahan!</strong>
            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        <div class="row">
            <div class="col-12">
                <div class="card mb-4">

                    <div class="card-header d-flex justify-content-between">
                        <h5 class="mb-0">Input Data Peminjaman</h5>
                        <small class="text-muted">Pastikan stok tersedia</small>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('peminjaman.store') }}" method="POST">
                            @csrf

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Nama Peminjam</label>
                                <div class="col-sm-10">
                                    <input type="text"
                                           name="nama_peminjam"
                                           class="form-control"
                                           placeholder="Masukkan nama lengkap"
                                           value="{{ old('nama_peminjam') }}"
                                           required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Pilih Barang</label>
                                <div class="col-sm-10">
                                    <select name="barang_id"
                                            class="form-select"
                                            required>
                                        <option value="" disabled selected>Pilih Barang...</option>
                                        @foreach ($barang as $a)
                                            <option value="{{ $a->id }}"
                                                {{ old('barang_id') == $a->id ? 'selected' : '' }}>
                                                {{ $a->nama_barang }} (Stok: {{ $a->stok }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Jumlah</label>
                                <div class="col-sm-10">
                                    <input type="number"
                                           name="jumlah"
                                           class="form-control"
                                           min="1"
                                           placeholder="Contoh: 1"
                                           required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Tanggal Pinjam</label>
                                <div class="col-sm-10">
                                    <input type="date"
                                           name="tanggal_pinjam"
                                           class="form-control"
                                           value="{{ old('tanggal_pinjam', date('Y-m-d')) }}"
                                           required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Estimasi Kembali</label>
                                <div class="col-sm-10">
                                    <input type="date"
                                           name="tanggal_kembali"
                                           class="form-control"
                                           value="{{ old('tanggal_kembali') }}">
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10">
                                    <select name="status"
                                            class="form-select"
                                            required>
                                        <option value="dipinjam"
                                            {{ old('status','dipinjam')=='dipinjam'?'selected':'' }}>
                                            Dipinjam
                                        </option>
                                        <option value="dikembalikan"
                                            {{ old('status')=='dikembalikan'?'selected':'' }}>
                                            Dikembalikan
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary px-4">
                                        Simpan Peminjaman
                                    </button>

                                    <a href="{{ route('peminjaman.index') }}"
                                       class="btn btn-outline-secondary ms-2">
                                       Batal
                                    </a>
                                </div>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
@endsection
