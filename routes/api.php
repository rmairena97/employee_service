<?php

use App\Http\Controllers\DisabledPersonController;
use App\Http\Controllers\PersonController;
use Illuminate\Support\Facades\Route;

Route::controller(PersonController::class)->group(function () {
    Route::post('/getPersonById', 'getPersonById');
    Route::post('/store', 'store');
});

Route::controller(DisabledPersonController::class)->group(function () {
    Route::post('/setDisability', 'setDisability');
});
