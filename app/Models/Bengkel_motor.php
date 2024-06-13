<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bengkel_motor extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_bengkel_motor';
    protected $fillable = ['nama_bengkel', 'alamat', 'no_hp', 'pemilik', 'deskripsi', 'foto', 'id_jenis_layanan'];


    public function Jenis_layanan() {
        return $this->hasMany(Jenis_layanan::class);
    }
}
