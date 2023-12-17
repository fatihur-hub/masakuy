<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    use HasFactory;
    protected $table = 'resep';
    protected $fillable = [
        'gambar', 'nama_resep', 'id_user', 'asal_kota', 'id_kategori', 'durasi', 'kesulitan', 'bahan', 'langkah', 'status'
    ];

   
    public function user() {
       return $this->belongsTo(User::class, 'id_user');
    }

    public function kategori() {
       return $this->belongsTo(kategori::class, 'id_kategori');
    }

    public function komens() {
       return $this->hasMany(Komen::class, 'id_resep');
    }
}
