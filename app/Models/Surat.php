<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'nik', 'alamat', 'telepon', 'jenis_surat', 'keperluan', 'dokumen_path', 'user_id', 'status', 'alasan_penolakan', 'file_admin_path'];

    // Relasi ke model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

