<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPegawai extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'nama_pegawai'];
    // protected $table = ['data_pegawai'];
    public $timestamps = true;

    public function jahit()
    {
        return $this->hasMany(Jahit::class, 'jahit_id');
    }
}
