<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    use HasFactory;

    protected $fillable = [
        'mata_kuliah', 'sks', 'jurusan_id', 'semester', 'kode',
    ];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }
}
