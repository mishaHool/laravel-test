<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\TestController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/hello', function () {
    return view('test');
});
Route::get('/tmp', [MainController::class, 'test']);
Route::get('/ret', [MainController::class,  'ret'])->name('ret');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::group(['middleware' => ['auth']], function () {
    Route::get('h1tmarker', [TestController::class, 'test']);
});
Route::post('/rec', [TestController::class, 'rec']);
Route::post('/upd', [TestController::class, 'upd']);

Route::get('/show', [TestController::class, 'show']);
Route::post('/dele', [TestController::class, 'del']);