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
            <span class="text-muted fw-light">Barang Masuk /</span> Detail
        </h4>

        <div class="card mb-4">
            <div class="card-body">

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Nama Barang</label>
                    <div class="col-sm-10">
                        <input type="text"
                               class="form-control"
                               value="{{ optional($barangmasuk->barang)->nama_barang ?? '-' }}"
                               disabled>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Jumlah</label>
                    <div class="col-sm-10">
                        <input type="number"
                               class="form-control"
                               value="{{ $barangmasuk->jumlah }}"
                               disabled>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Keterangan</label>
                    <div class="col-sm-10">
                        <input type="text"
                               class="form-control"
                               value="{{ $barangmasuk->keterangan }}"
                               disabled>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Tanggal</label>
                    <div class="col-sm-10">
                        <input type="text"
                               class="form-control"
                               value="{{ $barangmasuk->tanggal }}"
                               disabled>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-10 offset-sm-2">
                        <a href="{{ route('barangmasuk.index') }}" class="btn btn-primary">
                            Kembali
                        </a>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
@endsection
