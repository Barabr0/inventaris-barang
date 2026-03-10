@extends('layouts.app')

@section('content')
 <div class="content-wrapper">
                <form action="{{route('kategori.store')}}" method="Post">
                    @csrf
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
                            <input type="text" class="form-control" id="basic-default-name" placeholder="Nama kategori" name="nama_kategori"/>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-message">Deskripsi</label>
                          <div class="col-sm-10">
                            <textarea
                              id="basic-default-message"
                              class="form-control"
                              placeholder="Deskripsi"
                              aria-label="Deskripsi"
                              aria-describedby="basic-icon-default-message2"
                              name="deskripsi"
                            ></textarea>
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
