<?php
namespace App\Http\Controllers;

use App\Models\jahit;
use App\Models\potong;
use App\Models\Data_Qc;

use Illuminate\Http\Request;

class JahitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jahit = Jahit::all();
        return view('admin.jahit.index', compact('jahit'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jahit = Jahit::all();
        $potong  = Potong::all();
        $data_Qc = Data_Qc::all();
        return view('admin.jahit.create', compact('jahit', 'potong', 'data_Qc'));

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
            'nama_penjahit'     => 'required',
            'hasil_potong_pola' => 'required',
            'nama_barang'       => 'required',
            'lolos'             => 'required',
            'cacat'             => 'required',
        ]);

        $jahit                    = new Jahit();
        $jahit->nama_penjahit     = $request->nama_penjahit;
        $jahit->hasil_potong_pola = $request->hasil_potong_pola;
        $jahit->nama_barang       = $request->nama_barang;
        $jahit->lolos             = $request->lolos;
        $jahit->cacat             = $request->cacat;
        $jahit->save();

        return redirect()->route('jahit.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\jahit  $jahit
     * @return \Illuminate\Http\Response
     */
    public function show(jahit $jahit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\jahit  $jahit
     * @return \Illuminate\Http\Response
     */
    public function edit(jahit $jahit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\jahit  $jahit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, jahit $jahit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\jahit  $jahit
     * @return \Illuminate\Http\Response
     */
    public function destroy(jahit $jahit)
    {
        //
    }
}
