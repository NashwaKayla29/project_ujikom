<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Qc;
use App\Models\Data_Qc;
use App\Models\Jahit;
use Illuminate\Http\Request;

class QcController extends Controller
{
    public function index()
    {
        $data = Qc::with(['jahit', 'data_qc'])->get(); // pastikan relasi dibuat di model
        return response()->json([
            'success' => true,
            'message' => 'Data QC berhasil diambil',
            'data'    => $data,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'qc_id'          => 'required',
            'jahit_id'       => 'required',
            'lolos_Qc'       => 'required',
            'cacat_jual'     => 'required',
            'cacat_permanen' => 'required',
        ]);

        $qc = Qc::create([
            'qc_id'          => $request->qc_id,
            'jahit_id'       => $request->jahit_id,
            'lolos_Qc'       => $request->lolos_Qc,
            'cacat_jual'     => $request->cacat_jual,
            'cacat_permanen' => $request->cacat_permanen,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data QC berhasil disimpan',
            'data'    => $qc,
        ]);
    }

    public function show($id)
    {
        $qc = Qc::with(['jahit', 'data_qc'])->find($id);
        if (! $qc) {
            return response()->json(['success' => false, 'message' => 'Data tidak ditemukan'], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail data QC',
            'data'    => $qc,
        ]);
    }

    public function update(Request $request, $id)
    {
        $qc = Qc::find($id);
        if (! $qc) {
            return response()->json(['success' => false, 'message' => 'Data tidak ditemukan'], 404);
        }

        $qc->update([
            'qc_id'          => $request->qc_id,
            'jahit_id'       => $request->jahit_id,
            'lolos_Qc'       => $request->lolos_Qc,
            'cacat_jual'     => $request->cacat_jual,
            'cacat_permanen' => $request->cacat_permanen,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data QC berhasil diupdate',
            'data'    => $qc,
        ]);
    }

    public function destroy($id)
    {
        $qc = Qc::find($id);
        if (! $qc) {
            return response()->json(['success' => false, 'message' => 'Data tidak ditemukan'], 404);
        }

        $qc->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data QC berhasil dihapus',
        ]);
    }
}
