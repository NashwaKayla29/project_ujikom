<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Jahit;
use App\Models\Potong;
use App\Models\DataPegawai;

use Illuminate\Http\Request;

class JahitController extends Controller
{
    public function index()
    {
        $jahit = Jahit::with(['potong', 'data_pegawai'])->get();
        return response()->json([
            'success' => true,
            'message' => 'Data jahit berhasil diambil',
            'data'    => $jahit,
        ]);
    }

    public function store(Request $request)
    {
        // Validasi jika dibutuhkan
        // $request->validate([...]);

        $jahit = Jahit::create([
            'potong_id'     => $request->potong_id,
            'tanggal_jahit' => $request->tanggal_jahit,
            'pegawai_id'    => $request->pegawai_id,
            'nama_barang'   => $request->nama_barang,
            'lolos'         => $request->lolos,
            'cacat'         => $request->cacat,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data jahit berhasil ditambahkan',
            'data'    => $jahit,
        ]);
    }

    public function show($id)
    {
        $jahit = Jahit::with(['potong', 'data_pegawai'])->find($id);

        if (! $jahit) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data'    => $jahit,
        ]);
    }

    public function update(Request $request, $id)
    {
        $jahit = Jahit::find($id);

        if (! $jahit) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan',
            ], 404);
        }

        $jahit->update([
            'potong_id'     => $request->potong_id,
            'tanggal_jahit' => $request->tanggal_jahit,
            'pegawai_id'    => $request->pegawai_id,
            'nama_barang'   => $request->nama_barang,
            'lolos'         => $request->lolos,
            'cacat'         => $request->cacat,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data jahit berhasil diupdate',
            'data'    => $jahit,
        ]);
    }

    public function destroy($id)
    {
        $jahit = Jahit::find($id);

        if (! $jahit) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan',
            ], 404);
        }

        $jahit->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data jahit berhasil dihapus',
        ]);
    }
}
