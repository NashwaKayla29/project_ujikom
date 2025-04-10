@extends('layouts.backend.template')
@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.2/css/buttons.dataTables.css">
@endsection
@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Bahan</h4>
    <div class="card">
        <div class="card-body">
            <h4 class="card-header">Tabel bahan <a href="{{ route('bahan.create') }}" class="btn btn-sm btn-primary"
                    style="float: right"> + Tambah Data</a></h5>
                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered" id="example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama bahan</th>
                                <th>Ukuran bahan</th>
                                <th>Tanggal masuk bahan</th>
                                <th>Masa bahan</th>
                                <th>Yard</th>
                                <th>Stok</th>
                                <th class="no-export">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @php $i=1; @endphp
                            @foreach ($bahan as $data)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $data->nama_bahan }}</td>
                                    <td>{{ $data->ukuran_bahan }}</td>
                                    <td>{{ \Carbon\Carbon::parse($data->tanggal_masuk_bahan)->format('d M Y') }}</td>
                                    <td>{{ $data->masa_bahan }}</td>
                                    <td>{{ $data->yard }}</td>
                                    <td>{{ $data->stok }}</td>
                                    <td class="no-export">
                                        <form action="{{ route('bahan.destroy', $data->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="{{ route('bahan.edit', $data->id) }}">
                                                        <i class="bx bx-edit-alt me-1"></i> Edit
                                                    </a>
                                                    <button type="submit" class="dropdown-item btn-delete">
                                                        <i class="bx bx-trash-alt me-1"></i> Hapus
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                        <script>
                                            document.querySelectorAll('.btn-delete').forEach(button => {
                                                button.addEventListener('click', function(event) {
                                                    event.preventDefault(); // Mencegah form langsung terkirim

                                                    let form = this.closest("form"); // Ambil form terdekat dari tombol
                                                    let itemId = this.getAttribute('data-id'); // Ambil ID item

                                                    Swal.fire({
                                                        title: "Are you sure?",
                                                        text: "You won't be able to revert this!",
                                                        icon: "warning",
                                                        showCancelButton: true,
                                                        confirmButtonColor: "#3085d6",
                                                        cancelButtonColor: "#d33",
                                                        confirmButtonText: "Yes, delete it!"
                                                    }).then((result) => {
                                                        if (result.isConfirmed) {
                                                            form.submit(); // Kirim form hanya jika dikonfirmasi
                                                        }
                                                    });
                                                });
                                            });
                                        </script>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/dataTables.buttons.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.print.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const table = new DataTable('#example', {
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'pdf',
                        className: 'btn btn-sm btn-danger',
                        exportOptions: {
                            columns: ':not(.no-export)'
                        }
                    },
                    {
                        extend: 'excel',
                        className: 'btn btn-sm btn-success',
                        exportOptions: {
                            columns: ':not(.no-export)'
                        }
                    }
                ]
            });
        });
    </script>
@endpush
