<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommandCenter\CommandCenterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Command Center : Routes -------------
Route::controller(CommandCenterController::class)->group(function(){
    Route::get('/command-center', 'index')->name('command-center');
    Route::post('/command-center', 'commandCenter');
});
