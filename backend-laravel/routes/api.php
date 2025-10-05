<?php

use App\Http\Controllers\Api\RaffleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Endpoint de confirmação de pagamento -> Controller POST
Route::post('/confirmar-pagamento', [RaffleController::class, 'storeAquisition']); 