<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    // Specify the fillable attributes for mass assignment
    protected $fillable = ['judul', 'penulis', 'tanggalRilis', 'isi', 'kategori_id', 'foto'];

    // Define the relationship: An article belongs to a category
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}