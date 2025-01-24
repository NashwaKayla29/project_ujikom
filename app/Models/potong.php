<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class potong extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'bahan_id', 'hasil_potong_pola', 'jumlah_potong', 'tanggal_potong'];
    // protected $table = ['Potong']; 
    public $timestamps = true;

    public function bahan()
    {
        return $this->belongsTo(Bahan::class, 'bahan_id');
    }

    public function jahits()
    {
        return $this->hasMany(Jahit::class, 'potong_id');
    }
}   
