<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UnivController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', function () {
    return view('start');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// コントローラーごとのルーティング
Route::controller(BaseController::class)->middleware(['auth'])->group(function(){
   Route::get('/', 'index')->name('users.index');
});

Route::controller(UserController::class)->middleware(['auth'])->group(function(){
   Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
   Route::post('/users', 'store')->name('users.store');
   Route::get('/users/{base}', 'show'); 
});

Route::controller(UnivController::class)->middleware(['auth'])->group(function(){
   Route::get('/univ/{univName}', 'show')->name('univ.show');
});

Route::controller(EventController::class)->middleware(['auth'])->group(function(){
   Route::get('/events/index', 'index');
   Route::get('/events/look', 'look');
   Route::get('/events/plan', 'show');
   Route::post('/events', 'store');
   Route::get('/events/{event}', 'showResult');
});




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// require __DIR__.'/auth.php';
