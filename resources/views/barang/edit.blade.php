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

             <form action="{{ route('barang.update', $barang->id) }}"
                    method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text"
                                   class="form-control"
                                   name="nama_barang"
                                   value="{{ old('nama_barang', $barang->nama_barang) }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Stok</label>
                        <div class="col-sm-10">
                            <input type="number"
                                   class="form-control"
                                   name="stok"
                                   value="{{ old('stok', $barang->stok) }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Merk</label>
                        <div class="col-sm-10">
                            <input type="text"
                                   class="form-control"
                                   name="merk"
                                   value="{{ old('merk', $barang->merk) }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Kategori</label>
                        <div class="col-sm-10">
                            <select class="form-select" name="kategori_id">
                                <option disabled>Pilih...</option>
                                @foreach ($kategori as $k)
                                    <option value="{{ $k->id }}"
                                        {{ $barang->kategori_id == $k->id ? 'selected' : '' }}>
                                        {{ $k->nama_kategori }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Foto</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="foto">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-10 offset-sm-2">
                          @if ($barang->foto)
                            <img src="{{ asset('image/barang/'.$barang->foto) }}" width="80" class="rounded border">
                        @endif
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
