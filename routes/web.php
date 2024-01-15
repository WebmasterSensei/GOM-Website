<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\DailyVerseController;
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

Route::get('/', [UsersController::class, 'index'])->name('/');

// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
// Route::get('/admin/dashboard', function () {
//     return Inertia::render('ADMIN_DASHBOARD');
// })->middleware(['auth', 'verified'])->name('admin_dashboard');

   Route::get('/admin/dashboard', [AdminController::class, 'index'])->middleware(['auth', 'verified'])->name('admin.dashboard');
   Route::get('/dashboard', [UsersController::class, 'index'])->middleware(['auth', 'verified'])->name('users.dashboard');


    Route::get('events/new-event' , [EventsController::class, 'newEvent'])->name('events.new-event');
    Route::get('events/prev-event' , [EventsController::class, 'prevEvent'])->name('events.prev-event');
    Route::get('/api/user-data' , [EventsController::class, 'getUserData'])->name('userdata');
    Route::get('prev-event-getter' , [EventsController::class, 'getprevEvent'])->name('prev.getter');
    Route::get('new-event-getter' , [EventsController::class, 'getnewEvent'])->name('new.getter');
    Route::get('get_yt_links' , [EventsController::class, 'get_yt_links'])->name('get_yt_links');
    Route::get('/d-verse' , [DailyVerseController::class, 'index'])->name('deverse');
    Route::post('/d-verse/store' , [DailyVerseController::class, 'store'])->name('store.verse');

Route::middleware('auth')->group(function () {


    Route::get('events/index' , [EventsController::class, 'index'])->name('events.index');

    Route::post('events/store' , [EventsController::class, 'store'])->name('events.store');
    Route::get('youtubelinks' , [EventsController::class, 'linksIndex'])->name('links');
    Route::post('youtube-store' , [EventsController::class, 'linksStore'])->name('links.store');
    Route::post('up-image/{id}' , [EventsController::class, 'updateImagePrev'])->name('up-image');
    Route::get('getter' , [EventsController::class, 'getter'])->name('getter');

    Route::put('likes/{id}' , [EventsController::class, 'hitlike'])->name('likes');
   
   

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
