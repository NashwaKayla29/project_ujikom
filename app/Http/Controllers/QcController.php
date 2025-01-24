<?php
namespace App\Http\Controllers;

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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Qc  $qc
     * @return \Illuminate\Http\Response
     */
    public function show(Qc $qc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Qc  $qc
     * @return \Illuminate\Http\Response
     */
    public function edit(Qc $qc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Qc  $qc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Qc $qc)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Qc  $qc
     * @return \Illuminate\Http\Response
     */
    public function destroy(Qc $qc)
    {
        //
    }
}
