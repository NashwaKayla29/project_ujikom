<?php
namespace App\Http\Controllers;

use Alert;
use App\Models\Bahan;
use App\Models\Jahit;
use App\Models\Potong;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class LaporanController extends Controller
{
    public function boot()
    {
        Carbon::setLocale('id');
    }

    public function index()
    {
        return view('admin.laporan.index');
    }

    public function report(Request $request)
{
    $start        = Carbon::parse($request->tanggalAwal)->startOfDay();
    $end          = Carbon::parse($request->tanggalAkhir)->endOfDay();
    $jenisLaporan = $request->jenisLaporan;

    if ($start > $end) {
        Alert::warning('Warning', 'Tanggal yang dimasukkan tidak sesuai');
        return back();
    }

    switch ($jenisLaporan) {
        case 'Bahan':
            $query = Bahan::whereBetween('tanggal_masuk_bahan', [$start, $end])->get();
            $total = Bahan::whereBetween('tanggal_masuk_bahan', [$start, $end])->count();
            break;

        case 'Jahit':
            $query = Jahit::whereBetween('created_at', [$start, $end])->get();
            $total = Jahit::whereBetween('created_at', [$start, $end])->count();
            break;

        case 'Potong':
            $query = Potong::whereBetween('created_at', [$start, $end])->get();
            $total = Potong::whereBetween('created_at', [$start, $end])->count();
            break;

        default:
            Alert::warning('Warning', 'Jenis laporan tidak valid');
            return back();
    }



    return view('admin.laporan.report', [
        'data'         => $query,
        'total'        => $total,
        'start'        => $start,
        'end'          => $end,
        'jenisLaporan' => $jenisLaporan,
    ]);
}


public function printReport(Request $request)
{
    $start = $request->tanggalAwal;
    $end = $request->tanggalAkhir;
    $jenisLaporan = $request->jenisLaporan;

    $startDate = Carbon::parse($start)->startOfDay();
    $endDate = Carbon::parse($end)->endOfDay();

    switch ($jenisLaporan) {
        case 'Bahan':
            $query = Bahan::whereBetween('created_at', [$startDate, $endDate])->get();
            $total = $query->count();
            break;
        case 'Jahit':
            $query = Jahit::whereBetween('created_at', [$startDate, $endDate])->get();
            $total = $query->count();
            break;
        case 'Potong':
            $query = Potong::whereBetween('created_at', [$startDate, $endDate])->get();
            $total = $query->count();
            break;
        default:
            Alert::warning('Warning', 'Jenis laporan tidak valid');
            return back();
    }

    $pdf = PDF::loadView('admin.laporan.report_pdf', [
        'query' => $query,
        'start' => $start,
        'end' => $end,
        'jenisLaporan' => $jenisLaporan,
        'total' => $total,
    ]);

    return $pdf->download('laporan-' . $jenisLaporan . '.pdf');
}


}
