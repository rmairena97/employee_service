<?php

use App\Http\Controllers\PersonController;
use Illuminate\Support\Facades\Route;

Route::controller(PersonController::class)->group(function () {
    Route::post('/getPersonById', 'getPersonById');
    Route::post('/store', 'store');
});
