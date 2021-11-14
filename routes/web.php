<?php

use App\Http\Controllers\ChannelsController;
use App\Http\Controllers\DiscussionController;
use App\Http\Controllers\ForumsController;
use App\Http\Controllers\RepliesController;
use App\Http\Controllers\WatchersController;
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

Auth::routes();

Route::get('/', [App\Http\Controllers\ForumsController::class, 'index'])->name('forum');

Route::get('/forum', [App\Http\Controllers\ForumsController::class, 'index'])->name('forum');

Route::get('/channel/{slug}', [ForumsController::class, 'channel'])->name('channel.forum');

Route::get('/discussion/{slug}', [DiscussionController::class, 'show'])->name('discussion.show');

// REGISTERING ALL THE ROUTES UNDER THE AUTH

Route::group(['middleware' => 'auth'], function () {

    Route::resource('channels', ChannelsController::class);

    Route::get('/discussion/create/new', [DiscussionController::class, 'create'])->name('discussion.create');

    Route::post("/discussion/store", [DiscussionController::class, 'store'])->name('discussion.store');

    Route::post('/discussion/reply/{id}', [DiscussionController::class, 'reply'])->name('discussion.reply');

    Route::get('/reply/like/{id}', [RepliesController::class, 'like'])->name('reply.like');

    Route::get('/reply/unlike/{id}', [RepliesController::class, 'unlike'])->name('reply.unlike');

    Route::get('/discussion/watch/{id}',[WatchersController::class, 'watch'])->name('discussion.watch');

    Route::get('/discussion/unwatch/{id}',[WatchersController::class, 'unwatch'])->name('discussion.unwatch');

    Route::get('/discussion/best_answer/{id}', [RepliesController::class, 'best_answer'])->name('discussion.best_answer');

    Route::get('/discussion/edit/{slug}',[DiscussionController::class, 'edit'])->name('discussion.edit');

    Route::post('/discussion/update/{id}',[DiscussionController::class, 'update'])->name('discussion.update');

    Route::get('/reply/edit/{id}',[RepliesController::class, 'edit'])->name('reply.edit');

    Route::post('/reply/update/{id}',[RepliesController::class, 'update'])->name('reply.update');
});
