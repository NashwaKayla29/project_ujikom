<?php
namespace App\Http\Controllers;

use App\Models\Bahan;
Use Alert;
use Carbon;
use Illuminate\Http\Request;

class BahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bahan = Bahan::all();
        return view('admin.bahan.index', compact('bahan'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.bahan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_bahan'          => 'required',
            'ukuran_bahan'        => 'required',
            'tanggal_masuk_bahan' => 'required',
            'masa_bahan'          => 'required',
            'yard'                => 'required',
        ]);

        $tanggal_masuk_bahan = Carbon::parse($request->tanggal_masuk_bahan)->format('d F Y');
        $bahan                      = new Bahan();
        $bahan->nama_bahan          = $request->nama_bahan;
        $bahan->ukuran_bahan        = $request->ukuran_bahan;
        $bahan->tanggal_masuk_bahan = $request->tanggal_masuk_bahan;
        $bahan->masa_bahan          = $request->masa_bahan;
        $bahan->yard                = $request->yard;
        $bahan->save();

        Alert::success('Success', 'Data berhasil di tambah')->autoClose(1000);
        return redirect()->route('bahan.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bahan = Bahan::findOrFail($id);
        return view('admin.bahan.edit', compact('bahan'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_bahan'          => 'required',
            'ukuran_bahan'        => 'required',
            'tanggal_masuk_bahan' => 'required',
            'masa_bahan'          => 'required',
            'yard'                => 'required',
        ]);

        $tanggal_masuk_bahan = Carbon::parse($request->tanggal_masuk_bahan)->format('d F Y');
        $bahan                      = Bahan::findOrFail($id);
        $bahan->nama_bahan          = $request->nama_bahan;
        $bahan->ukuran_bahan        = $request->ukuran_bahan;
        $bahan->tanggal_masuk_bahan = $request->tanggal_masuk_bahan;
        $bahan->masa_bahan          = $request->masa_bahan;
        $bahan->yard                = $request->yard;
        $bahan->save();

        Alert::success('Success', 'Data berhasil di ubah')->autoClose(1000);
        return redirect()->route('bahan.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bahan = Bahan::findOrFail($id);
        $bahan->delete();

        Alert::success('Success', 'Data berhasil di hapus')->autoClose(1000);
        return redirect()->route('bahan.index');

    }
}
