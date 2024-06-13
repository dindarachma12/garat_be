<?php

namespace App\Http\Controllers;

use App\Models\TambalBan;
use Illuminate\Http\Request;

class TambalBanController extends Controller
{
    public function index()
    {
        return response()->json(TambalBan::all());
    }

    public function show($id) 
    {
        $tambal_ban = TambalBan::find($id);
        if (!$tambal_ban)
        {
            return response()->json(["message"=> "Daftar Tambal ban tidak ditemukan :("],404);
        }
        return response()->json($tambal_ban);
    }
}
