@extends('layouts.backend.template')
@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Table/</span> Data pegawai</h4>

    <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Tambah Data pegawai</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('data_pegawai.update', $data_pegawai->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-fullname">Nama pegawai</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama_pegawai" value="{{$data_pegawai->nama_pegawai}}"
                            placeholder="Nama pegawai" name="nama_pegawai" />
                        @error('nama_pegawai')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row justify-content-end">
                    <div class="col-sm-10">
                        <a href="{{ route('data_pegawai.index') }} " class="btn btn-primary">Kembali</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
