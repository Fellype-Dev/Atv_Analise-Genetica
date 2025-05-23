<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExameController;

Route::get('/', function () {
    return redirect()->route('exames.index');
});

Route::resource('exames', ExameController::class);



Route::get('/', function () {
    return view('welcome');
});
