<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TambalBan extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_tambal_ban';
    protected $fillable = ['nama_tambal_ban', 'alamat', 'no_hp', 'pemilik', 'deskripsi', 'foto', 'id_jenis_layanan'];


    public function Jenis_layanan() {
        return $this->hasMany(Jenis_layanan::class);
    }
}
