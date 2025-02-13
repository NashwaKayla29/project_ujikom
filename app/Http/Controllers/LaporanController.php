<?php
namespace App\Http\Controllers;

use Alert;
use App\Models\Bahan;
use App\Models\Jahit;
use App\Models\Potong;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        return view('admin.laporan.index');
    }

    public function report(Request $request)
    {
        $start        = $request->tanggalAwal;
        $end          = $request->tanggalAkhir;
        $jenisLaporan = $request->jenisLaporan;

        if ($start > $end) {
            Alert::warning('Warning', 'Tanggal yang dimasukkan tidak sesuai');
            return back();
        }

        switch ($jenisLaporan) {
    case 'Bahan':
        $query = Bahan::whereBetween('bahans.created_at', [$start, $end])->get();
        $total = Bahan::whereBetween('created_at', [$start, $end])->count();
        break;
    case 'Jahit':
        $query = Jahit::whereBetween('jahits.created_at', [$start, $end])->get();
        $total = Jahit::whereBetween('created_at', [$start, $end])->count();
        break;
    case 'Potong':
        $query = Potong::whereBetween('potongs.created_at', [$start, $end])->get();
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
        $start        = $request->tanggalAwal;
        $end          = $request->tanggalAkhir;
        $jenisLaporan = $request->jenisLaporan;

        switch ($jenisLaporan) {
    case 'Bahan':
        $query = Bahan::whereBetween('bahans.created_at', [$start, $end])->get();
        $total = Bahan::whereBetween('created_at', [$start, $end])->count();
        break;
    case 'Jahit':
        $query = Jahit::whereBetween('jahits.created_at', [$start, $end])->get();
        $total = Jahit::whereBetween('created_at', [$start, $end])->count();
        break;
    case 'Potong':
        $query = Potong::whereBetween('potongs.created_at', [$start, $end])->get();
        $total = Potong::whereBetween('created_at', [$start, $end])->count();
        break;
    default:
        Alert::warning('Warning', 'Jenis laporan tidak valid');
        return back();
}


        $pdf = \PDF::loadView('admin.laporan.report_pdf', compact('query', 'start', 'end', 'jenisLaporan', 'total'));
        return $pdf->download('laporan-' . $jenisLaporan . '.pdf');
    }
}
