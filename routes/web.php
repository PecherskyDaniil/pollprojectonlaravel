<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\PollController;
use App\Http\Controllers\DBcontroller;
use App\Http\Resources\ClientResource;
use App\Http\Resources\AppFormResource;
use App\Models\AppForm;
use App\Models\Client;
Route::get('/', function () {
    return view('info');
});
Route::get('/hello',[SiteController::class, 'helloempty']);
Route::get('/hello/{name}',[SiteController::class, 'hello']);
Route::get('/poll',[PollController::class, 'getPoll']);
Route::post('/poll',[PollController::class, 'postPoll']);
Route::post('/results',[PollController::class, 'deleteAppForm']);
Route::get('/results',[PollController::class, 'getResults']);
Route::get('/client/{id}', function (string $id) {
    return new ClientResource(Client::findOrFail($id));
});
Route::get('/appform/{id}', function (string $id) {
    return new AppFormResource(AppForm::findOrFail($id));
});