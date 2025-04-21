<?php
namespace App\Http\Controllers;

use Alert;
use App\Models\Bahan;
use App\Models\Jahit;
use App\Models\Potong;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
        // Ambil data absensi sesuai filter
        $report = Report::with('bahan')
            ->when($request->tanggal_mulai, function ($query) use ($request) {
                $query->whereDate('tanggal', '>=', $request->tanggal_mulai);
            })
            ->when($request->tanggal_selesai, function ($query) use ($request) {
                $query->whereDate('tanggal', '<=', $request->tanggal_selesai);
            })
            ->when($request->id_bahan, function ($query) use ($request) {
                $query->where('id_bahan', $request->id_bahan);
            })
            ->orderBy('tanggal', 'desc')
            ->get();

        $tanggal_mulai   = $request->tanggal_mulai;
        $tanggal_selesai = $request->tanggal_selesai;

        return view('admin.laporan.report', compact('absensis', 'bahan', 'tanggal_mulai', 'tanggal_selesai'));
    }

    // Export PDF berdasarkan filter
    public function exportPdf(Request $request)
    {
        // Ambil data absensi sesuai filter
        $report = Report::with('bahan')
            ->when($request->tanggal_mulai, function ($query) use ($request) {
                $query->whereDate('tanggal', '>=', $request->tanggal_mulai);
            })
            ->when($request->tanggal_selesai, function ($query) use ($request) {
                $query->whereDate('tanggal', '<=', $request->tanggal_selesai);
            })
            ->when($request->id_bahan, function ($query) use ($request) {
                $query->where('id_bahan', $request->id_bahan);
            })
            ->orderBy('tanggal', 'desc')
            ->get();

        // Kirim data ke view PDF
        $pdf = Pdf::loadView('admin.laporan.report_pdf', compact('report'));

        // Bisa stream atau download, silakan pilih
        return $pdf->download('laporan_report.pdf');
        // return $pdf->stream('laporan_absensi.pdf'); // Kalau mau ditampilkan di browser
    }
}
