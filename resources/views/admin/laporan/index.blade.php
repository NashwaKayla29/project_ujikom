@extends('layouts.backend.template')
@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.2/css/buttons.dataTables.css">
@endsection
@section('content')
    {{-- @include('layouts._flash') --}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Data laporan') }}</div>
                    <div class="card-body">
                        <form action="{{ route('report') }}" method="post">
                            @csrf
                            <div class="mb-4 form-group">
                                <label for="jenisLaporan">Jenis Laporan</label>
                                <select name="jenisLaporan" id="jenisLaporan" class="form-control">
                                    <option value="Bahan">Bahan</option>
                                    <option value="Jahit">Jahit</option>
                                    <option value="Potong">Potong</option>
                                </select>
                            </div>
                            <div class="mb-4 form-group">
                                <label for="tanggalAwal">Date Start</label>
                                <input type="date" name="tanggalAwal" id="tanggalAwal" class="form-control">
                            </div>
                            <div class="mb-4 form-group">
                                <label for="tanggalAkhir">Date End</label>
                                <input type="date" name="tanggalAkhir" id="tanggalAkhir" class="form-control">
                            </div>
                            <div class="mb-4 form-group">
                                <button class="btn btn-block btn-primary" type="submit">Search Report</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection