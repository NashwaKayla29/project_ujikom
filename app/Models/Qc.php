<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qc extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'jahit_id', 'qc_id', 'lolos_Qc', 'cacat_jual', 'cacat_permanen'];
    // protected $table = ['Bahan'];
    public $timestamps = true;

    public function data_Qc()
    {
        return $this->belongsTo(data_Qc::class, 'qc_id');
    }

    public function jahit()
    {
        return $this->belongsTo(Jahit::class, 'jahit_id');
    }
}
