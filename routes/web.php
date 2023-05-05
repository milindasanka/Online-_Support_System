<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/old_tickets', function () {
    return view('old_tickets');
});

Route::post('/creat_ticket', [TicketController::class, 'createticket']);
Route::get('/searchtx', [TicketController::class, 'searchtx'])->name('searchtx');;

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/viewticket/{RID}', [App\Http\Controllers\TicketController::class, 'viewticket'])->name('viewticket');
Route::post('/update_ticket', [TicketController::class, 'update_ticket']);

