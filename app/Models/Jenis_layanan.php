<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis_layanan extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_jenis_layanan';
    protected $fillable = ['nama_layanan', 'id_user'];


    // public function User() {
    //     return $this->belongsTo(User::class);
    // }
    public function Bengkel_motor() {
        return $this->belongsTo(Bengkel_motor::class);
    }

    public function Bengkel_mobil() {
        return $this->belongsTo(Bengkel_mobil::class);
    }
    public function Towing() {
        return $this->belongsTo(Towing::class);
    }
    public function TambalBan() {
        return $this->belongsTo(TambalBan::class);
    }

    public function Polisi() {
        return $this->belongsTo(Polisi::class);
    }

}

