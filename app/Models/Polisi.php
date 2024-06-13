<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Polisi extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_laporan';
    protected $fillable = ['laporan', 'pelapor', 'no_hp', 'alamat', 'keterangan', 'id_user', 'id_jenis_layanan'];


    public function Jenis_layanan() {
        return $this->hasMany(Jenis_layanan::class);
    }

    public function User() {
        return $this->belongsTo(User::class);
    }
}
