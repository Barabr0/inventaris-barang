@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="content-wrapper">

        @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Terjadi kesalahan!</strong>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Forms /</span> Edit Barang
        </h4>

        <div class="card mb-4">
            <div class="card-body">

             <form action="{{ route('barangkeluar.update', $barangkeluar->id) }}"
                    method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                     <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Nama Barang</label>
                        <div class="col-sm-10">
                            <select class="form-select" name="barang_id">
                                <option disabled>Pilih...</option>
                                @foreach ($barang as $b)
                                    <option value="{{ $b->id }}"
                                        {{ $barangkeluar->barang_id == $b->id ? 'selected' : '' }}>
                                        {{ $b->nama_barang }}(Stok: {{ $b->stok }} & {{ $b->merk }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">jumlah</label>
                        <div class="col-sm-10">
                            <input type="number"
                                   class="form-control"
                                   name="jumlah"
                                   value="{{ old('jumlah', $barangkeluar->jumlah) }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">keterangan</label>
                        <div class="col-sm-10">
                            <input type="text"
                                   class="form-control"
                                   name="keterangan"
                                   value="{{ old('keterangan', $barangkeluar->keterangan) }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">tanggal</label>
                        <div class="col-sm-10">
                            <input type="date"
                                   class="form-control"
                                   name="tanggal"
                                   value="{{ old('tanggal', $barangkeluar->tanggal) }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-10 offset-sm-2">
                            <button type="submit" class="btn btn-primary">
                                Update
                            </button>
                        </div>
                    </div>

                </form>

            </div>
        </div>

    </div>
</div>
@endsection
