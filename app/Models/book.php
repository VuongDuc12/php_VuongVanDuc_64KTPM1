<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    use HasFactory;

    // Định nghĩa các cột có thể điền (fillable)
    protected $fillable = ['title', 'author', 'publication_year', 'genre', 'library_id'];

    // Định nghĩa mối quan hệ với Student (thesis thuộc về một sinh viên)
    public function library()
    {
        return $this->belongsTo(library::class);
    }
}
