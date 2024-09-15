<?php

use App\Http\Controllers\AuhtorController;
use App\Http\Controllers\formController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('observers',AuhtorController::class);
Route::resource('form',formController::class);

Route::controller(formController::class)->group(function(){
    Route::get('restore/data','restorePage')->name('form.restore');
    Route::get('restore/restore/{id}','restoreDataPage')->name('form.dataRestore');
    Route::get('restore/force-delete/{id}','forceDelete')->name('form.delete');

});