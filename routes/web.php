<?php


ini_set('display_errors',1);

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UnivController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\IndividualController;
use App\Http\Controllers\TimelineController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\MembershipRequestController;
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
   Route::get('/users/profile', 'profile')->name('users.profile');
   Route::post('/users', 'store')->name('users.store');
   Route::get('/users/{base}', 'show'); 
});

Route::controller(UnivController::class)->middleware(['auth'])->group(function(){
   Route::get('/univ/{univName}', 'show')->name('univ.show');
});

Route::controller(EventController::class)->middleware(['auth'])->group(function(){
   Route::get('/events/look', 'look');
   Route::get('/events/plan', 'show')->name('events.plan');
   Route::post('/events', 'store')->name('events.store');
   Route::get('/events/{eventid}', 'showDetail')->name('events.showdt');
   Route::get('/events/{event}', 'showResult');
   Route::get('/event/{event}', 'showResult')->name('event.result');
   Route::get('/eventsRequest/{eventid}', 'showRequestResult')->name('events.requestResult');
   Route::get('/events/admin/{id}', 'showAdmin')->name('events.admin');
   Route::post('/events/update/{id}', 'update')->name('events.update');
   // API
});

Route::controller(CommunityController::class)->middleware(['auth'])->group(function(){
    Route::get('communities/{category}', 'show')->name('communities.show');
});

Route::controller(IndividualController::class)->middleware(['auth'])->group(function(){
    Route::get('/individuals/plan', 'show')->name('individuals.plan');
    Route::post('/individuals', 'store')->name('individuals.store');
    Route::get('/individuals/{individual}', 'showResult')->name('individuals.result');
    Route::get('individuals/show/{individual}', 'showDetail')->name('individuals.show');
    Route::post('/individuals/{individual}/join}', 'sendJoinRequest')->name('individuals.join');
    Route::get('/individuals/admin/{id}', 'showAdmin')->name('individuals.admin');
    Route::post('/individuals/update/{id}', 'update')->name('individuals.update');
});

Route::controller(TimelineController::class)->middleware(['auth'])->group(function(){
    Route::post('/timeline', 'store')->name('timeline.store');
    Route::post('/comment', 'addComment')->name('timeline.addComment');
});

Route::controller(MembershipRequestController::class)->middleware(['auth'])->group(function(){
    Route::post('/allow-membership', 'allowMembership')->name('allow-Membership');
    
});

Route::controller(ImageController::class)->middleware(['auth'])->group(function(){
    Route::get('/test-idx', 'view')->name('images.show');
    Route::post('/image-post', 'store')->name('images.store');
    
});
Route::controller(NotificationController::class)->middleware(['auth'])->group(function(){
    Route::post('/send-notification', 'NotificationController@sendNotification');
    Route::get('/get-notifications', 'getNotifications');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
