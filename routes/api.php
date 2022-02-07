<?php

use App\Http\Controllers\Api\LinkController;
use Illuminate\Support\Facades\Route;

Route::post('store', [LinkController::class, 'store']);