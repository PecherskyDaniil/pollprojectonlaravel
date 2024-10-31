<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\PollController;
Route::get('/', function () {
    return view('info');
});
Route::get('/hello',[SiteController::class, 'helloempty']);
Route::get('/hello/{name}',[SiteController::class, 'hello']);
Route::get('/poll',[PollController::class, 'getPoll']);
Route::post('/poll',[PollController::class, 'postPoll']);
Route::get('/results',[PollController::class, 'getResults']);