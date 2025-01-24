<?php
namespace App\Http\Controllers;

use App\Models\DataPegawai;
use Illuminate\Http\Request;

class DataPegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_pegawai = DataPegawai::all();
        return view('admin.data_pegawai.index', compact('data_pegawai'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.data_pegawai.create');
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
            'nama_pegawai' => 'required',
        ]);

        $data_pegawai               = new DataPegawai();
        $data_pegawai->nama_pegawai = $request->nama_pegawai;
        $data_pegawai->save();

        return redirect()->route('data_pegawai.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\data_pegawai  $data_pegawai
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\data_pegawai  $data_pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_pegawai = DataPegawai::findOrFail($id);
        return view('admin.data_pegawai.edit', compact('data_pegawai'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\data_pegawai  $data_pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_pegawai' => 'required',
        ]);

        $data_pegawai               = DataPegawai::findOrFail($id);
        $data_pegawai->nama_pegawai = $request->nama_pegawai;
        $data_pegawai->save();

        return redirect()->route('data_pegawai.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\data_pegawai  $data_pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_pegawai = DataPegawai::findOrFail($id);
        $data_pegawai->delete();
        return redirect()->route('data_pegawai.index');

    }
}
