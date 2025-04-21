<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Bahan;
use App\Models\Potong;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PotongController extends Controller
{
    public function index(): JsonResponse
    {
        $potong = Potong::with('bahan')->get();
        return response()->json([
            'success' => true,
            'message' => 'List Data Potong',
            'data'    => $potong,
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'bahan_id'          => 'required|exists:bahan,id',
            'hasil_potong_pola' => 'required',
            'jumlah_potong'     => 'required|integer',
            'tanggal_potong'    => 'required|date',
        ]);

        $bahan = Bahan::findOrFail($request->bahan_id);

        if ($request->jumlah_potong > $bahan->stok) {
            return response()->json([
                'success' => false,
                'message' => 'Stok bahan tidak mencukupi.',
            ], 400);
        }

        $potong                    = new Potong();
        $potong->bahan_id          = $request->bahan_id;
        $potong->hasil_potong_pola = $request->hasil_potong_pola;
        $potong->jumlah_potong     = $request->jumlah_potong;
        $potong->tanggal_potong    = $request->tanggal_potong;
        $potong->save();

        $bahan->stok -= $request->jumlah_potong;
        $bahan->save();

        return response()->json([
            'success' => true,
            'message' => 'Data potong berhasil ditambahkan',
            'data'    => $potong,
        ]);
    }

    public function show($id): JsonResponse
    {
        $potong = Potong::with('bahan')->find($id);
        if (! $potong) {
            return response()->json([
                'success' => false,
                'message' => 'Data potong tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail data potong',
            'data'    => $potong,
        ]);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $request->validate([
            'bahan_id'          => 'required|exists:bahan,id',
            'hasil_potong_pola' => 'required',
            'jumlah_potong'     => 'required|integer',
            'tanggal_potong'    => 'required|date',
        ]);

        $potong = Potong::findOrFail($id);

        $potong->bahan_id          = $request->bahan_id;
        $potong->hasil_potong_pola = $request->hasil_potong_pola;
        $potong->jumlah_potong     = $request->jumlah_potong;
        $potong->tanggal_potong    = $request->tanggal_potong;
        $potong->save();

        return response()->json([
            'success' => true,
            'message' => 'Data potong berhasil diupdate',
            'data'    => $potong,
        ]);
    }

    public function destroy($id): JsonResponse
    {
        $potong = Potong::find($id);
        if (! $potong) {
            return response()->json([
                'success' => false,
                'message' => 'Data potong tidak ditemukan',
            ], 404);
        }

        $potong->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data potong berhasil dihapus',
        ]);
    }
}
