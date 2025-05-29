<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SolicitudController;


Route::get('/', function () {
    return view('welcome');
});

Route::resource("taller", SolicitudController::class); // podemos usar el nombre que queramos en project

