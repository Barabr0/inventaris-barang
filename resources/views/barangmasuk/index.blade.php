@extends('layouts.app')

@section('content')
<div class="content-wrapper">
  <div class="container-xxl flex-grow-1 container-p-y">
    @if (session('success'))
    <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const alertElement = document.getElementById('success-alert');

            if (alertElement) {
                setTimeout(function() {
                    const bsAlert = new bootstrap.Alert(alertElement);
                    bsAlert.close();
                }, 1000);
            }
        });
    </script>
@endif

    @if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
     <script>
        document.addEventListener('DOMContentLoaded', function() {
            const alertElement = document.getElementById('success-alert');

            if (alertElement) {
                setTimeout(function() {
                    const bsAlert = new bootstrap.Alert(alertElement);
                    bsAlert.close();
                }, 3000);
            }
        });
    </script>
    @endif
        <div class="card-header justify-content- align-items-center mb-10">
<a href="{{route('barangmasuk.export')}}" class="btn btn-success">
        <i class="bx bx-export"></i> Export Excel
    </a>

<a href="{{route('barangmasuk.pdf')}}" class="btn btn-danger">
        <i class="bx bx-export"></i> Export PDF
    </a>
</div>
    <div class="card mt-3">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0">Barang Masuk</h5>
        <a href="{{ route('barangmasuk.create') }}" class="btn btn-sm btn-primary">
          <i class="bx bx-add-circle me-1"></i> Add
        </a>
      </div>
      <div class="">
        <table class="table table-dark">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Jumlah</th>
              <th>Keterangan</th>
              <th>Tanggal</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            @php
                $no = 1
            @endphp
            @forelse ($barang_masuk as $a)
              <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $a->barang->nama_barang ?? '-' }}</td>
                <td>{{ $a->jumlah }}</td>
                <td>{{ $a->keterangan }}</td>
                <td>{{ $a->tanggal }}</td>
                <td>
                    <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a href="{{ route('barangmasuk.edit', $a->id) }}" class="dropdown-item text-warning">
                                <i class="bx bx-edit-alt me-1"></i> Edit
                              </a>
                              <a href="{{ route('barangmasuk.show', $a->id) }}" class="dropdown-item text-dark">
                                <i class="bx bx-show-alt me-1"></i> Show
                              </a>
                              <form action="{{ route('barangmasuk.destroy', $a->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus barang ini?')">
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
                <td colspan="6" class="text-center">Data barang kosong</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
