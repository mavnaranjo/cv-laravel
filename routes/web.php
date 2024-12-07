<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CVController;

Route::get('/', function () {
    return redirect('/cv/web');
});

Route::get('/cv/{format}', CVController::class);
