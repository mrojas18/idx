<?php

use App\Http\Controllers\CotizacionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get( '/test', function () {
    return view('test');
})->name('test'); 

Route::get('/api/token', [CotizacionController::class, 'getToken']);
Route::get('/reporte', [CotizacionController::class, 'reporte']);
