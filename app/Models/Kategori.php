<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $table = 'kategori';
    protected $fillable = [
        'kategori',
        'thumbnail'
    ];

    public function reseps() {
       return $this->hasMany(Resep::class, 'id_kategori');
    }
}
