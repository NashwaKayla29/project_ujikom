<?php
namespace App\Http\Controllers;

use Alert;
use App\Models\bahan;
use App\Models\potong;
use Illuminate\Http\Request;

class PotongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $potong = Potong::all();
        return view('admin.potong.index', compact('potong'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $potong = Potong::all();
        $bahan  = Bahan::all();
        return view('admin.potong.create', compact('potong', 'bahan'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validated = $request->validate([
        //     'bahan_id'          => 'required',
        //     'hasil_potong_pola' => 'required',
        //     'jumlah_potong'     => 'required',
        //     'tanggal_potong'    => 'required',
        // ]);
        $bahan = Bahan::findOrFail($request->bahan_id);

        if ($request->jumlah_potong > $bahan->stok) {
            return redirect()->route('potong.create')->with(['error' => 'Stok Kurang!']);
        }

        $potong                    = new Potong();
        $potong->bahan_id          = $request->bahan_id;
        $potong->hasil_potong_pola = $request->hasil_potong_pola;
        $potong->jumlah_potong     = $request->jumlah_potong;
        $potong->tanggal_potong    = $request->tanggal_potong;

        $bahan->stok -= $request->jumlah_potong;
        $bahan->save();

        $potong->save();

        Alert::success('Success', 'Data berhasil di tambah')->autoClose(1000);
        return redirect()->route('potong.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\potong  $potong
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\potong  $potong
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $potong = Potong::findOrFail($id);
        $bahan  = Bahan::all();
        return view('admin.potong.edit', compact('potong', 'bahan'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\potong  $potong
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'bahan_id'          => 'required',
            'hasil_potong_pola' => 'required',
            'jumlah_potong'     => 'required',
            'tanggal_potong'    => 'required',
        ]);

        $potong                    = Potong::findOrFail($id);
        $potong->bahan_id          = $request->bahan_id;
        $potong->hasil_potong_pola = $request->hasil_potong_pola;
        $potong->jumlah_potong     = $request->jumlah_potong;
        $potong->tanggal_potong    = $request->tanggal_potong;
        $potong->save();

        Alert::success('Success', 'Data berhasil di ubah')->autoClose(1000);
        return redirect()->route('potong.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\potong  $potong
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $potong = Potong::findOrFail($id);
        $potong->delete();

        Alert::success('Success', 'Data berhasil di hapus')->autoClose(1000);
        return redirect()->route('potong.index');

    }
}
