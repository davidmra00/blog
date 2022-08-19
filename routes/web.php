<?php

use App\Http\Controllers\ContactanosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

/* Route::get('/', function () {
    return view('welcome');
})->name('home'); */

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::controller(PostController::class)->group(function(){
    Route::get('/','index')->name('posts.index');
    Route::get('posts/{post}','show')->name('posts.show');
    Route::get('category/{category}','category')->name('posts.category');
    Route::get('tag/{tag}','tag')->name('posts.tag');
});

Route::controller(ContactanosController::class)->group(function(){
    Route::get('contactanos','index')->name('contactanos.index');
    Route::post('contactanos','store')->name('contactanos.store');
});
