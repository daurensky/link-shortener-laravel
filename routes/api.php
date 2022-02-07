<?php

use App\Http\Controllers\Api\LinkController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return \App\Models\Link::all();
});
Route::post('store', [LinkController::class, 'store']);