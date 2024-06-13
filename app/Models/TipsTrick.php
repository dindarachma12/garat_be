<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

    class TipsTrick extends Model
    {
        use HasFactory;
        protected $primaryKey = 'id_tips';
        protected $fillable = ['judul', 'keterangan', 'foto'];
    }
