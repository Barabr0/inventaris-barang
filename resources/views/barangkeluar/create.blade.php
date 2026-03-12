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
                <form action="{{route('barangkeluar.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Barang Masuk</h4>
              <div class="row">
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-body">
                      <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="inputGroupSelect01">
                                    Barang
                                </label>
                                <div class="col-sm-10">
                                    <select class="form-select" id="inputGroupSelect01" name="barang_id">
                                        <option selected disabled>Pilih...</option>
                                        @foreach ($barang as $a)
                                        <option value="{{$a->id}}" name="barang_id">{{$a->nama_barang}}(Stok : {{$a->stok}} & {{$a->merk}})</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Jumlah</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="basic-default-name" placeholder="Jumlah" name="jumlah"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Keterangan</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="basic-default-name" placeholder="Keterangan" name="keterangan"/>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Tanggal</label>
                          <div class="col-sm-10">
                            <input type="date" class="form-control" id="basic-default-name" name="tanggal"/>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <div class="input-group">
                      </div>
                        </div>
                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Tambahkan</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
        </form>
    </div>
</div>
</div>
    </div>
</div>
@endsection
