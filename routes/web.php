<?php

use App\Http\Controllers\AppPagesController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [AppPagesController::class, 'home'])->name('home');
Route::get('/new-result', [AppPagesController::class, 'addResult'])->name('new-result');
Route::get('/lga-result', [AppPagesController::class, 'lgaResult'])->name('lga-result');
