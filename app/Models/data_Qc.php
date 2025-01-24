<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data_Qc extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'nama_Qc'];
    // protected $table = ['Bahan'];
    public $timestamps = true;

    public function Qc()
    {
        return $this->hasMany(Qc::class, 'Qc_id');
    }
}
