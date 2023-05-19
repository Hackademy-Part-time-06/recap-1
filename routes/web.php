<?php

use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [PublicController::class, 'index'])->name('beer.index');
Route::get('/show/{id}', [PublicController::class, 'show'])->name('beer.show');
Route::post('/invia', [PublicController::class, 'send'])->name('beer.send');

Route::view('/grazie', 'beer.order.thankyou')->name('beer.thankyou');





Route::get('/info', [PublicController::class, 'show'])->name('beer.info');

Route::get('/contact', [PublicController::class, 'show'])->name('beer.contact');
