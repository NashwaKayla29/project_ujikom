@extends('layouts.backend.template')
@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Table/</span> Qc</h4>

    <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Tambah qc</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('Qc.update', $Qc->id) }}" method="POST">
                @csrf
                @method('PUT')
                 <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-fullname">Nama Qc</label>
                    <div class="col-sm-10">
                        {{-- <input type="text" class="form-control" id="basic-default-name" placeholder="Nama Barang"
                            name="nama_barang" /> --}}
                        <select name="qc_id" class="form-control">
                            <option value="" disabled selected>Pilih Barang</option>
                            @foreach ($data_Qc as $data)
                                <option value="{{ $data->id }}">{{ $data->nama_Qc }}</option>
                            @endforeach
                        </select>
                        @error('qc_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-fullname">Nama Barang</label>
                    <div class="col-sm-10">
                        {{-- <input type="text" class="form-control" id="basic-default-name" placeholder="Nama Barang"
                            name="nama_barang" /> --}}
                        <select name="jahit_id" class="form-control">
                            <option value="" disabled selected>Pilih Barang</option>
                            @foreach ($jahit as $data)
                                <option value="{{ $data->id }}">{{ $data->nama_barang }}</option>
                            @endforeach
                        </select>
                        @error('jahit_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-fullname">Lolos Qc</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="lolos_Qc" placeholder="lolos_Qc"
                            name="lolos_Qc" value="{{$Qc->lolos_Qc}}"/>
                        @error('lolos_Qc')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-fullname">Cacat jual</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="cacat_jual" placeholder="cacat_jual"
                            name="cacat_jual" value="{{$Qc->cacat_jual}}"/>
                        @error('cacat_jual')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-fullname">Cacat permanen</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="cacat_permanen" placeholder="cacat permanen"
                            name="cacat_permanen" value="{{$Qc->cacat_permanen}}"/>
                        @error('cacat_permanen')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row justify-content-end">
                    <div class="col-sm-10">
                        <a href="{{ route('Qc.index') }} " class="btn btn-primary">Kembali</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
