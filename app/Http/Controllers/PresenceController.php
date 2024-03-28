<?php

namespace App\Http\Controllers;

use App\Models\Presence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PresenceController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:sanctum')->except(['index']);
    }

    public function index()
    {
        $user = auth()->user();

        if ($user) {
            // Get the NIP of the authenticated user
            $nip = $user->nip;

            // Retrieve presences data associated with the user's NIP
            $presences = Presence::where('nip', $nip)->get();

            return response()->json($presences);
        }

        return response()->json(['error' => 'Unauthenticated'], 401);
    }

    public function show($id)
    {
        $presence = Presence::findOrFail($id);
        return response()->json($presence);
    }
    

    public function store(Request $request)
    {
        // Authenticate the user using Sanctum
        $user = Auth::user();

        // Validate the request data
        $data = $request->validate([
            'nip' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'waktu' => 'required|date',
            'device_id' => 'required|string',
        ]);

        // Create a new Presence record associated with the authenticated user
        $presence = Presence::create($data);

        return response()->json($presence, 201);
    }

    // Implement other methods like update() and delete() as needed
}
