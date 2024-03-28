<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        // Ambil pengguna menggunakan metode authenticateUser
        $user = $this->authenticateUser($request->nip, $request->device_id);
    
        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    
        // Membuat token baru menggunakan Sanctum pada model pengguna
        $tokenResult = $user->createToken('mobile-app-token');
        
        if (!$tokenResult || !$tokenResult->accessToken) {
            return response()->json(['error' => 'Failed to create token'], 500);
        }
    
        // Atur waktu kedaluwarsa token (contoh: 1 hari)
        $tokenResult->accessToken->expires_at = now()->addDay(1);
        $tokenResult->accessToken->save();
    
        return response()->json([
            'access_token' => $tokenResult->plainTextToken,
            'token_type' => 'Bearer',
            'expires_at' => $tokenResult->accessToken->expires_at,
        ]);
    }

    public function getByNIP(Request $request)
    {
        $request->validate([
            'nip' => 'required|string', // Pastikan request memiliki parameter 'nip' yang tidak boleh kosong
        ]);

        // Ambil data pegawai berdasarkan NIP dari request
        $pegawai = Pegawai::where('nip', $request->nip)->first();

        if (!$pegawai) {
            return response()->json(['message' => 'Pegawai tidak ditemukan'], 404);
        }

        return response()->json($pegawai);
    }

    private function authenticateUser($nip, $deviceId)
    {
        return Pegawai::where('nip', $nip)
                      ->where('device_id', $deviceId)
                      ->where('soft_delete', 0) // Hanya mencari data yang belum dihapus
                      ->first();
    }
}
