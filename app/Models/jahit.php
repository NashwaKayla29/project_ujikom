<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jahit extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'id_potong', 'tanggal_jahit', 'nama_barang', 'pegawai_id', 'lolos', 'cacat'];

    public function potong()
    {
        return $this->belongsTo(Potong::class, 'potong_id');
    }

    public function data_pegawai()
    {
        return $this->belongsTo(DataPegawai::class, 'pegawai_id');
    }

    public function qcs()
    {
        return $this->hasMany(Qc::class, 'jahit_id');
    }
}
