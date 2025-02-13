<?php

namespace App\Http\Controllers;

use App\Models\bahan;
use App\Models\DataPegawai;
use App\Models\data_Qc;
use App\Models\jahit;
use App\Models\potong;
use App\Models\Qc;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $bahan = Bahan::count();
        $data_Qc = data_Qc::count();
        $data_pegawai = DataPegawai::count();
        $jahit = Jahit::count();
        $potong = Potong::count();
        $Qc = Qc::count();

        return view('home', compact( 'bahan', 'data_pegawai', 'data_Qc', 'jahit', 'potong', 'Qc'));
    }
}
