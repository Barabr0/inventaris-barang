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
            <span class="text-muted fw-light">Forms /</span> Show Barang
        </h4>

        <div class="card mb-4">
            <div class="card-body">

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text"
                                   class="form-control"
                                   name="nama_barang"
                                   value="{{ old('nama_barang', $barang->nama_barang) }}"
                                   disabled>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Stok</label>
                        <div class="col-sm-10">
                            <input type="number"
                                   class="form-control"
                                   name="stok"
                                   value="{{ old('stok', $barang->stok) }}"
                                   disabled>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Merk</label>
                        <div class="col-sm-10">
                            <input type="text"
                                   class="form-control"
                                   name="merk"
                                   value="{{ old('merk', $barang->merk) }}"
                                   disabled>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Kategori</label>
                        <div class="col-sm-10">
                            <input type="text"
                                class="form-control"
                                value="{{ $barang->kategori->nama_kategori }}"
                                disabled>
                        </div>
                    </div>
                  <div class="row mb-3">
    <label class="col-sm-2 col-form-label">Foto</label>
                    <div class="col-sm-10">
                        @if ($barang->foto)
                            <img src="{{ asset('image/barang/'.$barang->foto) }}"
                                width="80"
                                class="rounded border">
                        @else
                            <span class="text-muted">Tidak ada foto</span>
                        @endif
                    </div>
                </div>
                    <div class="row">
                        <div class="col-sm-10 offset-sm-2">
                            <a href="{{route('barang.index')}}" class="btn btn-primary">
                                back
                            </a>
                        </div>
                    </div>

                </form>

            </div>
        </div>

    </div>
</div>
@endsection
