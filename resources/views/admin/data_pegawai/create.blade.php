@extends('layouts.backend.template')
@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Table/</span> Data pegawai</h4>

    <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Tambah Data Pegawai</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('data_pegawai.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-fullname">Nama pegawai</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama_pegawai" value="{{ old('nama_pegawai') }}"
                            placeholder="Nama pegawai" name="nama_pegawai" />
                        @error('nama_pegawai')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row justify-content-end">
                    <div class="col-sm-10">
                        <a href="{{ route('data_pegawai.index') }} " class="btn btn-primary">Back</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
