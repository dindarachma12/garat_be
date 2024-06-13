<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $status = '';
        $message = '';
        $data = null;
        $token = null;
        $status_code = 200;

        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required|string',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 'failed',
                    'message' => $validator->errors()->first(),
                    'data' => null
                ], 400);
            }

            $user = User::where('email', $request->email)->first();

            if (!$user) {
                $status = 'failed';
                $message = 'Email tidak terdaftar';
                $status_code = 401;
            } elseif (!Hash::check($request->password, $user->password)) {
                $status = 'failed';
                $message = 'Password salah';
                $status_code = 401;
            } else {
                $token = $user->createToken('api_token')->plainTextToken;
                $user->save();
                $status = 'success';
                $message = 'Login berhasil';
                $data = $user;
                $status_code = 200;
            }
        } catch (\Exception $e) {
            $status = 'failed';
            $message = 'Gagal menjalankan request: ' . $e->getMessage();
            $status_code = 500;
        } finally {
            return response()->json([
                'status' => $status,
                'message' => $message,
                'data' => $data,
                'access_token' => $token,
            ], $status_code);
        }
    }
}
