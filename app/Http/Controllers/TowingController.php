<?php

namespace App\Http\Controllers;

use App\Models\Towing;
use Illuminate\Http\Request;

class TowingController extends Controller
{
    public function index()
    {
        return response()->json(Towing::all());
    }

    public function show($id)
    {
        $towing = Towing::find($id);
        if (!$towing) {
            return response()->json(['message' => 'Daftar Towing tidak ditemukan :('], 404);
        }
        return response()->json($towing);
    }
}
