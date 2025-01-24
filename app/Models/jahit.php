<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jahit extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'id_potong', 'nama_barang', 'id_data_pegawai', 'lolos', 'cacat'];

    public function potong()
    {
        return $this->belongsTo(Potong::class, 'potong_id');
    }

    public function pegawai()
    {
        return $this->belongsTo(DataPegawai::class, 'data_pegawai_id');
    }

    public function qcs()
    {
        return $this->hasMany(Qc::class, 'jahit_id');
    }
}
