<?php

use App\Events\ServerStatusChanged;
use App\Http\Controllers\VueController;
use Illuminate\Support\Facades\Route;


Route::get('/',  [VueController::class, 'index']);
Route::get('/event', function(){
    ServerStatusChanged::dispatch("message");
});
Route::any('/{any}', [VueController::class, 'index']);

