<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bengkel_motor;
use Illuminate\Support\Facades\Storage;

class BengkelMotorController extends Controller
{
    public function index()
    {
        return response()->json(Bengkel_motor::all());
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'nama_bengkel' => 'required|string|max:255',
                'alamat'=> 'required|string|max:255',
                'no_hp' => 'required|string|max:15',
                'pemilik' => 'required|string|max:255',
                'deskripsi' => 'required|string',
                'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'id_jenis_layanan' => 'required|exists:jenis_layanans,id_jenis_layanan'
            ]
            );

        $bengkel_motor = new Bengkel_motor();
        $bengkel_motor->nama_bengkel = $request->nama_bengkel;
        $bengkel_motor->alamat = $request->alamat;
        $bengkel_motor->no_hp = $request->no_hp;
        $bengkel_motor->pemilik = $request->pemilik;
        $bengkel_motor->deskripsi = $request->deskripsi;
        $bengkel_motor->id_jenis_layanan = $request->id_jenis_layanan;

        if ($request->hasFile('foto'))
        {
            $imagePath = $request->file('foto')->store('bengkel_fotos', 'public');
            $bengkel_motor->foto = $imagePath;
        }

        $bengkel_motor->save();

        return response()->json($bengkel_motor, 201);

        
    }

    public function show($id)
    {
        $bengkel_motor = Bengkel_motor::find($id);
        if (!$bengkel_motor) {
            return response()->json(['message' => 'Daftar Bengkel Motor tidak ditemukan :('], 404);
        }
        return response()->json($bengkel_motor);
    }
}
