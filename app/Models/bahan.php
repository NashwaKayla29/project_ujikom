<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bahan extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'nama_bahan', 'ukuran_bahan', 'tanggal_masuk_bahan', 'masa_bahan', 'yard', 'stok', 'stok_sisa', 'keterangan'];
    // protected $table = ['Bahan'];
    public $timestamps = true;

     public function potong()
    {
        return $this->hasMany(Potong::class, 'bahan_id');
    }
}
