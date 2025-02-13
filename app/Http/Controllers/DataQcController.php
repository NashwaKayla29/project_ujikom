<?php
namespace App\Http\Controllers;

use App\Models\Data_Qc;
Use Alert;
use Illuminate\Http\Request;

class DataQcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_Qc = Data_Qc::all();
        return view('admin.data_Qc.index', compact('data_Qc'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.data_Qc.create');

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
            'nama_Qc' => 'required',
        ]);

        $data_Qc          = new Data_Qc();
        $data_Qc->nama_QC = $request->nama_Qc;
        $data_Qc->save();

        Alert::success('Success', 'Data berhasil di tambah')->autoClose(1000);
        return redirect()->route('data_Qc.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\data_Qc  $data_Qc
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\data_Qc  $data_Qc
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_Qc = Data_Qc::findOrFail($id);
        return view('admin.data_Qc.edit', compact('data_Qc'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\data_Qc  $data_Qc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_Qc' => 'required',
        ]);

        $data_Qc          = Data_Qc::findOrFail($id);
        $data_Qc->nama_Qc = $request->nama_Qc;
        $data_Qc->save();

        Alert::success('Success', 'Data berhasil di ubah')->autoClose(1000);
        return redirect()->route('data_Qc.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\data_Qc  $data_Qc
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_Qc = Data_Qc::findOrFail($id);
        $data_Qc->delete();

        Alert::success('Success', 'Data berhasil di hapus')->autoClose(1000);
        return redirect()->route('data_Qc.index');

    }
}
