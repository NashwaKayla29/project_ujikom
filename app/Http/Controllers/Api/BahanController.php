<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Bahan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $bahan = Bahan::all();
        return response()->json([
            'success' => true,
            'message' => 'Daftar Bahan',
            'data'    => $bahan,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'nama_bahan'          => 'required',
            'ukuran_bahan'        => 'required',
            'tanggal_masuk_bahan' => 'required|date',
            'masa_bahan'          => 'required',
            'yard'                => 'required|numeric',
        ]);

        $validated['tanggal_masuk_bahan'] = Carbon::parse($request->tanggal_masuk_bahan)->format('Y-m-d');
        $bahan                            = ModelBahan::create($validated);

        return response()->json(['success' => true, 'message' => 'Data berhasil ditambahkan', 'data' => $bahan], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show($id)
    {
        $bahan = Bahan::findOrFail($id);
        if (! $bahan) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan',
            ], 404);
        }
        return response()->json(['success' => true, 'data' => $bahan]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(Request $request, $id): JsonResponse
    {
        $validated = $request->validate([
            'nama_bahan'          => 'required',
            'ukuran_bahan'        => 'required',
            'tanggal_masuk_bahan' => 'required|date',
            'masa_bahan'          => 'required',
            'yard'                => 'required|numeric',
        ]);

        $bahan = Bahan::find($id);
        if (! $bahan) {
            return response()->json(['success' => false, 'message' => 'Data tidak ditemukan'], 404);
        }

        $validated['tanggal_masuk_bahan'] = Carbon::parse($request->tanggal_masuk_bahan)->format('Y-m-d');
        $bahan->update($validated);

        return response()->json(['success' => true, 'message' => 'Data berhasil diperbarui', 'data' => $bahan]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        $bahan = Bahan::find($id);
        if (! $bahan) {
            return response()->json(['success' => false, 'message' => 'Data tidak ditemukan'], 404);
        }

        $bahan->delete();
        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
