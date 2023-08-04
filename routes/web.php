<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\UserController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', [BaseController::class, 'index']);
Route::get('/', [BaseController::class, 'index'])->name('users.index');

# 以下のコメントアウトしたコードは使わないはず
// Route::get('/', function() {
//     return view('bases.index');
// });
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
// ルートパスに対して/users/{base}が来たら、showを返す
Route::get('/users/{base}', [UserController::class, 'show']);
