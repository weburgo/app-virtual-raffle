<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contacts;
use Illuminate\Http\Request;

//Controller Geral
class RaffleController extends Controller
{

//func() -> faz a tipagem -> guarda request 
    public function storeAquisition(Request $request)
    {
        $aquisition = $request->validate([

            'name' => 'required|string|max:255',
            'phone' => 'required |string|max:255',
            'number' => 'required|string|max:255',

        ]);

//func() -> Interpreta $aquisition para Json -> Contacts Model 
        Contacts::create($aquisition);

        return response()->json([

            'message' => 'Reservado com sucesso! Boa sorte! 🍀',

        ], 201);
    }
}
