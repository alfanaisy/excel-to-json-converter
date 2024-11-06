<?php

use App\Http\Controllers\ExcelController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/import', function() {
    return view('excel-upload');
});
Route::post('/import-excel', [ExcelController::class, 'import']);
