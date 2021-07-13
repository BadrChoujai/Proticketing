<?php

use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\TicketController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('tickets', [DashboardController::class, 'Totaltickets']);

Route::get('agenttickets', [DashboardController::class, 'Agenttickets']);
Route::get('agents', [DashboardController::class, 'Totalusers']);
Route::resource('ticketss', TicketController::class);
// Route::get('its', [DashboardController::class, 'Totalits']);
// Route::get('closed', [DashboardController::class, 'Closeticket']);
// Route::get('open', [DashboardController::class, 'Openticket']);


