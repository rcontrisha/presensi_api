<?php

namespace App\Http\Controllers;

use App\Models\Kantor;
use Illuminate\Http\Request;

class KantorController extends Controller
{
    public function index(Request $request)
    {
        // Mendapatkan id_kantor dari parameter request atau pengguna yang sedang login
        $id_kantor = $request->input('id_kantor') ?? auth()->user()->id_kantor;

        // Mengambil data kantor berdasarkan id_kantor
        $kantor = Kantor::find($id_kantor);

        // Memastikan kantor ditemukan
        if (!$kantor) {
            return response()->json([
                'message' => 'Data kantor tidak ditemukan'
            ], 404);
        }

        // Mengembalikan data kantor sebagai respons JSON
        return response()->json($kantor);
    }
}
