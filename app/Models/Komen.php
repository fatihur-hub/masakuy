<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komen extends Model
{
    use HasFactory;
    protected $table = 'komen';
    protected $fillable = [
        'id_user', 'id_resep', 'komen'
    ];

    // Sesuaikan dengan hubungan antar model jika diperlukan
    // Contoh: 
    public function user() {
       return $this->belongsTo(User::class, 'id_user');
    }

    public function resep() {
       return $this->belongsTo(Resep::class, 'id_resep');
    }
}
