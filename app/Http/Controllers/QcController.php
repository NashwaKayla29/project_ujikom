<?php
namespace App\Http\Controllers;

use Alert;
use App\Models\Data_Qc;
use App\Models\Jahit;
use App\Models\Qc;
use Illuminate\Http\Request;

class QcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Qc = Qc::all();
        return view('admin.Qc.index', compact('Qc'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Qc      = Qc::all();
        $data_Qc = Data_Qc::all();
        $jahit   = Jahit::all();
        return view('admin.Qc.create', compact('Qc', 'data_Qc', 'jahit'));

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

        $Qc                 = new Qc();
        $Qc->qc_id          = $request->qc_id;
        $Qc->jahit_id       = $request->jahit_id;
        $Qc->lolos_Qc       = $request->lolos_Qc;
        $Qc->cacat_jual     = $request->cacat_jual;
        $Qc->cacat_permanen = $request->cacat_permanen;
        $Qc->save();

        Alert::success('Success', 'Data berhasil di tambah')->autoClose(1000);
        return redirect()->route('Qc.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Qc  $qc
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Qc  $qc
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Qc      = Qc::findOrFail($id);
        $data_Qc = Data_Qc::all();
        $jahit   = Jahit::all();
        return view('admin.Qc.edit', compact('Qc', 'data_Qc', 'jahit'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Qc  $qc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $validated = $request->validate([
        //     'nama_Qc'          => 'required',
        //     'nama_barang' => 'required',
        //     'lolos_Qc'     => 'required',
        //     'cacat_jual'    => 'required',
        //     'cacat_permanen'    => 'required',
        // ]);

        $Qc                 = Qc::findOrFail($id);
        $Qc->qc_id          = $request->qc_id;
        $Qc->jahit_id       = $request->jahit_id;
        $Qc->lolos_Qc       = $request->lolos_Qc;
        $Qc->cacat_jual     = $request->cacat_jual;
        $Qc->cacat_permanen = $request->cacat_permanen;
        $Qc->save();

        Alert::success('Success', 'Data berhasil di ubah')->autoClose(1000);
        return redirect()->route('Qc.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Qc  $qc
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Qc = Qc::findOrFail($id);
        $Qc->delete();

        Alert::success('Success', 'Data berhasil di hapus')->autoClose(1000);
        return redirect()->route('Qc.index');

    }
}
