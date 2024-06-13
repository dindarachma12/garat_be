<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bengkel_mobil extends Model
{
    use HasFactory;

    
    protected $primaryKey = 'id_bengkel_mobil';
    protected $fillable = ['nama_bengkel', 'alamat', 'no_hp', 'pemilik', 'deskripsi', 'foto', 'id_jenis_layanan'];


    public function Jenis_layanan() {
        return $this->hasMany(Jenis_layanan::class);
    }
}
