<?php

namespace App\Http\Controllers;

use App\Models\TipsTrick;
use Illuminate\Http\Request;

class TipsTrickController extends Controller
{
    public function index()
    {
        return response()->json(TipsTrick::all());
    }

    public function show($id)
    {
        $tips = TipsTrick::find($id);
        if(!$tips)
        {
            return response()->json(["message"=> "Belum ada Tips and Trick"],404);
        }
        return response()->json($tips);
    }
}
