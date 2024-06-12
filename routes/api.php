<?php

use App\Http\Controllers\DisabledPersonController;
use App\Http\Controllers\PersonController;
use Illuminate\Support\Facades\Route;

Route::controller(PersonController::class)->group(function () {
    Route::post('/person/getPersonById', 'getPersonById');
    Route::post('/person/store', 'store');
    Route::post('person/search', 'search');
    Route::put('/person/update', 'update');
});

Route::controller(DisabledPersonController::class)->group(function () {
    Route::post('/setDisability', 'setDisability');
    Route::get('getPersonByDisability/{disability_id}', 'getPersonByDisability');
});

Route::controller(\App\Http\Controllers\OccupationPersonController::class)->group(function () {
   Route::post('setOccupationPerson', 'setOccupationPerson');
   Route::get('getOccupationPerson/{occupation_id}', 'getOccupationPerson');
});

Route::controller(\App\Http\Controllers\EducationPersonController::class)->group(function () {
    Route::post('setPersonByEducation', 'setEducationPerson');
    Route::post('getPersonByEducation', 'getEducationPerson');
});

Route::controller(\App\Http\Controllers\BankDataPersonController::class)->group(function () {
    Route::post('setBankDataPerson', 'setBankDataPerson');
});
