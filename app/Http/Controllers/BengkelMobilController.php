<?php

namespace App\Http\Controllers;

use App\Models\Bengkel_mobil;
use Illuminate\Http\Request;

class BengkelMobilController extends Controller
{
    public function index()
    {
        return response()->json(Bengkel_mobil::all());
    }

    public function show($id)
    {
        $bengkel_mobil = Bengkel_mobil::find($id);
        if (!$bengkel_mobil) {
            return response()->json(['message' => 'Daftar Bengkel Mobil tidak ditemukan :('], 404);
        }
        return response()->json($bengkel_mobil);
    }
}
