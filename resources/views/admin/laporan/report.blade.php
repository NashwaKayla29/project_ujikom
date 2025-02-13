@extends('layouts.backend.template')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header text-white">
                <h1 class="card-title">Laporan {{ ucfirst($jenisLaporan) }}</h1>
                <p style="color: black">Periode: {{ \Carbon\Carbon::parse($start)->format('d M Y') }} -
                    {{ \Carbon\Carbon::parse($end)->format('d M Y') }}</p>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Bahan</th>
                                <th>Tanggal</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->nama_bahan }}</td>
                                    <td>{{ $item->created_at->format('d M Y') }}</td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <p class="mt-3">Total: {{ $total }}</p>
                <form action="{{ route('printReport') }}" method="post">
                    @csrf
                    <input type="hidden" name="tanggalAwal" value="{{ $start }}">
                    <input type="hidden" name="tanggalAkhir" value="{{ $end }}">
                    <input type="hidden" name="jenisLaporan" value="{{ $jenisLaporan }}">
                    <button class="btn btn-primary" type="submit">Export PDF</button>
                    <a href="{{ route('laporan.index') }} " class="btn btn-primary">Back</a>
                </form>

            </div>
        </div>
    </div>
@endsection
