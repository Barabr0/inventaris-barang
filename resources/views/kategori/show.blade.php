@extends('layouts.app')

@section('content')
 <div class="content-wrapper">
            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> kategori</h4>
              <div class="row">
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-body">
                      <form>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Nama</label>
                          <div class="col-sm-10">
                            <label type="text" class="form-control" id="basic-default-name" name="nama_kategori" disable>{{$kategori->nama_kategori}}</label>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-message">Deskripsi</label>
                          <div class="col-sm-10">
                            <label
                              id="basic-default-message"
                              class="form-control"
                              aria-describedby="basic-icon-default-message2"
                              name="deskripsi"
                              disable
                              >
                             {{$kategori->deskripsi}}"
                            </label>
                          </div>
                        </div>
                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <a href="{{route('kategori.index')}}" class="btn btn-primary">Kembali</a>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
    </div>
</div>
</div>
    </div>
</div>
@endsection
