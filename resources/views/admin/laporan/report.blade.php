@extends('layouts.backend.template')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header text-white">
                <h1 class="card-title">Laporan {{ ucfirst($jenisLaporan) }}</h1>
                <p style="color: black">Periode:
                    {{ \Carbon\Carbon::parse($start)->format('d M Y') }} -
                    {{ \Carbon\Carbon::parse($end)->format('d M Y') }}
                </p>

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
                            @php $i = 1; @endphp
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>

                                    @if ($jenisLaporan == 'Bahan')
                                        <td>{{ $item->nama_bahan }}</td>
                                        <td>{{ \Carbon\Carbon::parse($item->tanggal_masuk_bahan)->format('d M Y') }}</td>
                                    @elseif ($jenisLaporan == 'Jahit')
                                        <td>{{ $item->nama_jahit }}</td>
                                        <td>{{ \Carbon\Carbon::parse($item->tanggal_jahit)->format('d M Y') }}</td>
                                    @elseif ($jenisLaporan == 'Potong')
                                        <td>{{ $item->nama_potong }}</td>
                                        <td>{{ \Carbon\Carbon::parse($item->tanggal_potong)->format('d M Y') }}</td>
                                    @endif

                                </tr>
                            @endforeach

                        </tbody>

                    </table>
                </div>
                <p class="mt-3">Total: {{ $total }}</p>
                <a href="{{ route('printReport', [
                    'tanggalAwal' => $start,
                    'tanggalAkhir' => $end,
                    'jenisLaporan' => $jenisLaporan,
                ]) }}"
                    target="_blank" class="btn btn-primary">
                    Export PDF
                </a>

                <a href="{{ route('laporan.index') }}" class="btn btn-primary">Kembali</a>


            </div>
        </div>
    </div>
@endsection
