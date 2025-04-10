@extends('layouts.backend.template')
@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Table/</span> Potong</h4>

    <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Tambah Potong</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('potong.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-fullname">Nama Bahan</label>
                    <div class="col-sm-10">
                        {{-- <input type="text" class="form-control" id="basic-default-name" placeholder="Nama Barang"
                            name="nama_barang" /> --}}
                        <select name="bahan_id" class="form-control">
                            <option value="" disabled selected>Pilih Barang</option>
                            @foreach ($bahan as $data)
                                <option value="{{ $data->id }}">{{ $data->nama_bahan }}</option>
                            @endforeach
                        </select>
                        @error('bahan_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-fullname">Hasil Potong Pola</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="hasil_potong_pola" placeholder="hasil potong pola"
                            name="hasil_potong_pola" />
                        @error('hasil_potong_pola')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-fullname">Jumlah potong</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="jumlah_potong" placeholder="jumlah potong"
                            name="jumlah_potong" />
                        @error('jumlah_potong')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-fullname">Tanggal potong</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="tanggal_potong" placeholder="tanggal potong"
                            name="tanggal_potong" />
                        @error('tanggal_potong')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                
                <div class="row justify-content-end">
                    <div class="col-sm-10">
                        <a href="{{ route('potong.index') }} " class="btn btn-primary">Kembali</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#potong').select2();
        });
    </script>
@endpush