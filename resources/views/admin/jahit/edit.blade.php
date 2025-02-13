@extends('layouts.backend.template')
@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Table/</span> jahit</h4>

    <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Tambah jahit</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('jahit.update', $jahit->id) }}" method="POST">
                @csrf
                @method('PUT')
                 <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-fullname">Nama Penjahit</label>
                    <div class="col-sm-10">
                        <select name="pegawai_id" class="form-control">
                            <option value="" disabled selected>Pilih Barang</option>
                            @foreach ($data_pegawai as $data)
                                <option value="{{ $data->id }}">{{ $data->nama_pegawai }}</option>
                            @endforeach
                        </select>
                        @error('pegawai_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-fullname">Tanggal jahit</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="tanggal_jahit" placeholder="tanggal jahit"
                            name="tanggal_jahit" value="{{$jahit->tanggal_jahit}}"/>
                        @error('tanggal_jahit')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-fullname">Hasil potong pola</label>
                    <div class="col-sm-10">
                        <select name="potong_id" class="form-control">
                            <option value="" disabled selected>Pilih Barang</option>
                            @foreach ($potong as $data)
                                <option value="{{ $data->id }}">{{ $data->hasil_potong_pola }}</option>
                            @endforeach
                        </select>
                        @error('potong_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-fullname">Nama barang</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama_barang" placeholder="nama barang"
                            name="nama_barang" value="{{$jahit->nama_barang}}"/>
                        @error('nama_barang')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-fullname">Lolos</label>
                    <div class="col-sm-10">
                        <input type="teks" class="form-control" id="lolos" placeholder="lolos"
                            name="lolos" value="{{$jahit->lolos}}"/>
                        @error('lolos')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-fullname">Cacat</label>
                    <div class="col-sm-10">
                        <input type="teks" class="form-control" id="cacat" placeholder="cacat"
                            name="cacat" value="{{$jahit->cacat}}"/>
                        @error('cacat')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row justify-content-end">
                    <div class="col-sm-10">
                        <a href="{{ route('jahit.index') }} " class="btn btn-primary">Back</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
