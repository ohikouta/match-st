<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UnivController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\IndividualController;
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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/login', function () {
//     return view('welcome')->name('login');
// });

Route::get('/', [BaseController::class, 'start'])->name('bases.start');

// Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// コントローラーごとのルーティング
Route::controller(BaseController::class)->middleware(['auth'])->group(function(){
  Route::get('/users/index', 'index')->name('users.index');
});

Route::controller(UserController::class)->middleware(['auth'])->group(function(){
   Route::get('/users/profile', [UserController::class, 'profile'])->name('users.profile');
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

Route::controller(CommunityController::class)->middleware(['auth'])->group(function(){
    Route::get('communities/{category}', 'show')->name('communities.show');
});

Route::controller(IndividualController::class)->middleware(['auth'])->group(function(){
    Route::get('individuals/plan', 'show');
    
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
