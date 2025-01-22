<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthorController;

Route::prefix('v1')->group(function () {

    Route::resource('author', AuthorController::class);

    Route::get('/test', function () {
        return view('welcome');
    });
});