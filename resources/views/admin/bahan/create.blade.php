@extends('layouts.backend.template')
@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Table/</span> Bahan</h4>

    <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Tambah Bahan</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('bahan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-fullname">Nama bahan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama_bahan" value="{{ old('nama_bahan') }}"
                            placeholder="Nama bahan" name="nama_bahan" />
                        @error('nama_bahan')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-fullname">Ukuran bahan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="ukuran_bahan" value="{{ old('ukuran_bahan') }}"
                            placeholder="Ukuran bahan" name="ukuran_bahan" />
                        @error('ukuran_bahan')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-fullname">Tanggal masuk bahan</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="tanggal_masuk_bahan"
                            value="{{ old('tanggal_masuk_bahan') }}" placeholder="Tanggal Masuk Bahan"
                            name="tanggal_masuk_bahan" />
                        @error('tanggal_masuk_bahan')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-fullname">Masa bahan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="masa_bahan" value="{{ old('masa_bahan') }}"
                            placeholder="Masa bahan" name="masa_bahan" />
                        @error('masa_bahan')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-fullname">Yard</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="yard" value="{{ old('yard') }}"
                            placeholder="Yard" name="yard" />
                        @error('yard')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-fullname">Stok</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="stok" value="{{ old('stok') }}"
                            placeholder="Stok" name="stok" />
                        @error('stok')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row justify-content-end">
                    <div class="col-sm-10">
                        <a href="{{ route('bahan.index') }} " class="btn btn-primary">Kembali</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
