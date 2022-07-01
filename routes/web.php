<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\ChatMessageController;

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

Auth::routes();

Route::get('/home', [ChatMessageController::class, 'index'])->name('home');
Route::get('/', [ChatMessageController::class, 'index']);
Route::get('chat_messages', [ChatMessageController::class, 'fetchMessages']);
Route::post('chat_messages', [ChatMessageController::class, 'sendMessage']);
Route::post('delete_message', [ChatMessageController::class, 'delete_message']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
