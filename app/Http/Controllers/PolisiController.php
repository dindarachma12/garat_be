<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Polisi;
use Illuminate\Support\Facades\Validator;

class PolisiController extends Controller
{
    public function index()
    {
        return response()->json(Polisi::all(), 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "pelapor" => "required|string|max:255",
            "no_hp" => "required|string|max:255",
            "alamat" => "required|string|max:255",
            "keterangan" => "required|string",
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $polisi = new Polisi();
        $polisi->pelapor = $request->pelapor;
        $polisi->no_hp = $request->no_hp;
        $polisi->alamat = $request->alamat;
        $polisi->keterangan = $request->keterangan;
        $polisi->id_user = $request->id_user; // Menetapkan id_user menjadi 1
        $polisi->id_jenis_layanan = 5;  // Menetapkan id_jenis_layanan menjadi 5
        $polisi->save();

        return response()->json($polisi, 201);
    }

    public function show($id)
    {
        $polisi = Polisi::find($id);
        if (is_null($polisi)) {
            return response()->json(["message" => "Report Not Found!"], 404);
        }
        return response()->json($polisi, 200);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            "pelapor" => "string|max:255",
            "no_hp" => "string|max:255",
            "alamat" => "string|max:255",
            "keterangan" => "string",
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $polisi = Polisi::find($id);
        if (is_null($polisi)) {
            return response()->json(['message' => 'User not Found!'], 404);
        }

        $polisi->update($request->all());
        
        return response()->json($polisi, 200);
    }

    public function destroy($id)
    {
        $polisi = Polisi::find($id);
        if (is_null($polisi)) {
            return response()->json(['message' => 'User not Found!'], 404);
        }

        $polisi->delete();
        return response()->json(['message' => 'User deleted permanently'], 200);
    }

    public function getByUserId($id_user)
    {
        $laporan = Polisi::where('id_user', $id_user)->get();

        if ($laporan->isEmpty()) {
            return response()->json(['message' => 'No reports found for this user'], 404);
        }

        return response()->json($laporan, 200);
    }

}
