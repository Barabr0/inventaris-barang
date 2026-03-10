@extends('layouts.app')

@section('content')
<div class="content-wrapper">
  <div class="container-xxl flex-grow-1 container-p-y">

    {{-- SUCCESS ALERT --}}
    @if (session('success'))
    <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const alertElement = document.getElementById('success-alert');
            if (alertElement) {
                setTimeout(() => {
                    new bootstrap.Alert(alertElement).close();
                }, 1000);
            }
        });
    </script>
    @endif

    {{-- ERROR ALERT --}}
    @if (session('error'))
    <div id="error-alert" class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const alertElement = document.getElementById('error-alert');
            if (alertElement) {
                setTimeout(() => {
                    new bootstrap.Alert(alertElement).close();
                }, 3000);
            }
        });
    </script>
    @endif
    <div class="card-header justify-content- align-items-center mb-10">
<a href="{{ route('barang.export')}}" class="btn btn-success">
        <i class="bx bx-export"></i> Export Excel
    </a>

<a href="{{route('barang.pdf')}}" class="btn btn-danger">
        <i class="bx bx-export"></i> Export PDF
    </a>
</div>
    {{-- CARD --}}
    <div class="card mt-3">

      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0">Barang</h5>
        <a href="{{ route('barang.create') }}" class="btn btn-sm btn-primary">
          <i class="bx bx-add-circle me-1"></i> Add
        </a>
      </div>

      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-dark table-bordered text-nowrap">

            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Stok</th>
                <th>Merk</th>
                <th>Kategori</th>
                <th>Foto</th>
                <th>Actions</th>
              </tr>
            </thead>

            <tbody>
              @php $no = 1; @endphp

              @forelse ($barang as $a)
              <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $a->nama_barang }}</td>
                <td>{{ $a->stok }}</td>
                <td>{{ $a->merk }}</td>
                <td>{{ $a->kategori->nama_kategori ?? '-' }}</td>

                <td>
                  @if ($a->foto)
                    <img src="{{ asset('image/barang/' . $a->foto) }}"
                         width="80"
                         class="rounded">
                  @else
                    <span class="text-muted">Tidak ada foto</span>
                  @endif
                </td>

                <td>
                  <div class="dropdown">
                    <button class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button>

                    <div class="dropdown-menu">
                      <a href="{{ route('barang.edit', $a->id) }}" class="dropdown-item text-warning">
                        <i class="bx bx-edit-alt me-1"></i> Edit
                      </a>

                      <a href="{{ route('barang.show', $a->id) }}" class="dropdown-item">
                        <i class="bx bx-show-alt me-1"></i> Show
                      </a>

                      <form action="{{ route('barang.destroy', $a->id) }}" method="POST"
                            onsubmit="return confirm('Yakin hapus?')">
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
                <td colspan="7" class="text-center">Data barang kosong</td>
              </tr>
              @endforelse

            </tbody>

          </table>
        </div>
      </div>

    </div>
  </div>
</div>
@endsection
