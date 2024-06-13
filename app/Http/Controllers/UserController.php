<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //

    public function index(){
        $users = User::all();
        return response()->json($users);
    }

    // nyimpen data di storage

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name"=> "required|string|max:255",
            "email"=> "required|string|email|max:255|unique:users",
            "password"=> "required|string|min:8",
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json($user, 201);
    }

    //show id
    public function show($id)
    {
        $user = User::find($id);
        if (is_null($user)) 
        {
            return response()->json(["message"=> "User Not Found!!!"],404);
        }
        return response()->json($user);
    }

    //update user
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'string|max:255',
            'email' => 'string|email|max:255',
            'password' => 'string|min:8', 

        ]);

        if ($validator->fails())
        {
            return response()->json($validator->errors(), 400);
        }

        $user = User::find($id);
        if (is_null($user)) 
        {
            return response()->json(['message'=> 'User not Found!!!'],404);
        }

        if ($request->has('name'))
        {
            $user->name = $request->name;
        }

        if ($request->has('email'))
        {
            $user->email = $request->email;
        }
        if ($request->has('password'))
        {
            $user->password = Hash::make($request->password);
        }

        $user->save();
        return response()->json($user);
    }

    //to remove id user

    public function destroy($id)
    {
        $user = User::find($id);
        if (is_null($user))
        {
            return response()->json(['message'=> 'User not Found!!!'],404);

        }

        $user->delete();
        return response()->json(['message'=> 'User deleted permanently'],200);
    }
}
