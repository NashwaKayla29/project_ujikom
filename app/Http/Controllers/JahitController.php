<?php
namespace App\Http\Controllers;

use App\Models\DataPegawai;
use App\Models\jahit;
use App\Models\potong;
Use Alert;
use Carbon;
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
        $jahit        = Jahit::all();
        $potong       = Potong::all();
        $data_pegawai = DataPegawai::all();
        return view('admin.jahit.create', compact('jahit', 'potong', 'data_pegawai'));

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
        //     'nama_penjahit'     => 'required',
        //     'hasil_potong_pola' => 'required',
        //     'nama_barang'       => 'required',
        //     'lolos'             => 'required',
        //     'cacat'             => 'required',
        // ]);

        $tanggal_jahit = Carbon::parse($request->tanggal_jahit)->format('d F Y');
        $jahit              = new Jahit();
        $jahit->potong_id   = $request->potong_id;
        $jahit->tanggal_jahit = $request->tanggal_jahit;
        $jahit->pegawai_id  = $request->pegawai_id;
        $jahit->nama_barang = $request->nama_barang;
        $jahit->lolos       = $request->lolos;
        $jahit->cacat       = $request->cacat;
        $jahit->save();

        Alert::success('Success', 'Data berhasil di tambah')->autoClose(1000);
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
    public function edit($id)
    {
        $jahit = Jahit::findOrFail($id);
        $potong  = Potong::all();
        $data_pegawai = DataPegawai::all();
        return view('admin.jahit.edit', compact('jahit', 'potong', 'data_pegawai'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\jahit  $jahit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $validated = $request->validate([
        //     'nama_penjahit'     => 'required',
        //     'hasil_potong_pola' => 'required',
        //     'nama_barang'       => 'required',
        //     'lolos'             => 'required',
        //     'cacat'             => 'required',
        // ]);

        $tanggal_jahit = Carbon::parse($request->tanggal_jahit)->format('d F Y');
        $jahit              = Jahit::findOrFail($id);
        $jahit->potong_id   = $request->potong_id;
        $jahit->tanggal_jahit = $request->tanggal_jahit;
        $jahit->pegawai_id  = $request->pegawai_id;
        $jahit->nama_barang = $request->nama_barang;
        $jahit->lolos       = $request->lolos;
        $jahit->cacat       = $request->cacat;
        $jahit->save();

        Alert::success('Success', 'Data berhasil di ubah')->autoClose(1000);
        return redirect()->route('jahit.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\jahit  $jahit
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jahit = Jahit::findOrFail($id);
        $jahit->delete();

        Alert::success('Success', 'Data berhasil di hapus')->autoClose(1000);
        return redirect()->route('jahit.index');

    }
}
