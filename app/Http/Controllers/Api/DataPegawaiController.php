<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DataPegawai;
use Illuminate\Http\Request;

class DataPegawaiController extends Controller
{
    // Tampilkan semua data pegawai
    public function index()
    {
        $data = DataPegawai::all();
        return response()->json([
            'success' => true,
            'message' => 'Daftar data pegawai',
            'data'    => $data,
        ], 200);
    }

    // Tambah data pegawai
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_pegawai' => 'required|string|max:255',
        ]);

        $pegawai = DataPegawai::create([
            'nama_pegawai' => $request->nama_pegawai,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data pegawai berhasil ditambahkan',
            'data'    => $pegawai,
        ], 201);
    }

    // Tampilkan detail pegawai
    public function show($id)
    {
        $pegawai = DataPegawai::find($id);

        if (! $pegawai) {
            return response()->json([
                'success' => false,
                'message' => 'Data pegawai tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail data pegawai',
            'data'    => $pegawai,
        ], 200);
    }

    // Ubah data pegawai
    public function update(Request $request, $id)
    {
        $pegawai = DataPegawai::find($id);

        if (! $pegawai) {
            return response()->json([
                'success' => false,
                'message' => 'Data pegawai tidak ditemukan',
            ], 404);
        }

        $validated = $request->validate([
            'nama_pegawai' => 'required|string|max:255',
        ]);

        $pegawai->nama_pegawai = $request->nama_pegawai;
        $pegawai->save();

        return response()->json([
            'success' => true,
            'message' => 'Data pegawai berhasil diupdate',
            'data'    => $pegawai,
        ], 200);
    }

    // Hapus data pegawai
    public function destroy($id)
    {
        $pegawai = DataPegawai::find($id);

        if (! $pegawai) {
            return response()->json([
                'success' => false,
                'message' => 'Data pegawai tidak ditemukan',
            ], 404);
        }

        $pegawai->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data pegawai berhasil dihapus',
        ], 200);
    }
}
