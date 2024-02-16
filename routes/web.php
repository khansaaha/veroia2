<?php

use Illuminate\Support\Facades\Route;
// routes/web.php

use App\Http\Controllers\ClipDropController;





/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});


// routes/web.php


Route::get('/', [ClipDropController::class, 'showForm']);
Route::post('/remove-background', [ClipDropController::class, 'removeBackground']);

