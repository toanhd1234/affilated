<?php

use Illuminate\Support\Facades\Route;
use Modules\Profile\src\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('api/profiles')->middleware(['jwt.auth'])->group(function () {
    Route::get('/', [ProfileController::class, 'getProfile']);

});
