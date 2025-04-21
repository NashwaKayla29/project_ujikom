<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Data_Qc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DataQcController extends Controller
{
    public function index()
    {
        $data = Data_Qc::all();
        return response()->json([
            'success' => true,
            'message' => 'List Semua Data QC',
            'data'    => $data,
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_Qc' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi Gagal',
                'errors'  => $validator->errors(),
            ], 422);
        }

        $data_Qc = Data_Qc::create([
            'nama_Qc' => $request->nama_Qc,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data QC berhasil ditambahkan',
            'data'    => $data_Qc,
        ], 201);
    }

    public function show($id)
    {
        $data_Qc = Data_Qc::find($id);

        if (! $data_Qc) {
            return response()->json([
                'success' => false,
                'message' => 'Data QC tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail Data QC',
            'data'    => $data_Qc,
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $data_Qc = Data_Qc::find($id);

        if (! $data_Qc) {
            return response()->json([
                'success' => false,
                'message' => 'Data QC tidak ditemukan',
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'nama_Qc' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi Gagal',
                'errors'  => $validator->errors(),
            ], 422);
        }

        $data_Qc->update([
            'nama_Qc' => $request->nama_Qc,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data QC berhasil diperbarui',
            'data'    => $data_Qc,
        ], 200);
    }

    public function destroy($id)
    {
        $data_Qc = Data_Qc::find($id);

        if (! $data_Qc) {
            return response()->json([
                'success' => false,
                'message' => 'Data QC tidak ditemukan',
            ], 404);
        }

        $data_Qc->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data QC berhasil dihapus',
        ], 200);
    }
}
