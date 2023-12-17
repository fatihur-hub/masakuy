<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Artikel extends Model
{
    use HasFactory;
    protected $table = 'artikel';
    protected $fillable = [
        'judul', 'author', 'gambar', 'artikel', 'slug', 'status'
    ];

    // Sesuaikan dengan hubungan antar model jika diperlukan
    // Contoh: 
    public function user() {
       return $this->belongsTo(User::class, 'author');
    }
    public function generateSlug()
    {
        return Str::slug($this->judul);
    }
}
