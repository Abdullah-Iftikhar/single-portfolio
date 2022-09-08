<?php

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

Route::get('/clear-cache', function () {
    \Illuminate\Support\Facades\Artisan::call("optimize:clear");
    return redirect()->route('login')->with('success', 'Cache clear successfully.');
});


Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/blog', function () {
    return view('blog');
})->name('blog');


Route::get('/blog/detail', function () {
    return view('blog-detail');
})->name('blog.detail');

Route::group(['prefix' => 'admin'], function () {
    Route::group(['middleware' => 'verified'], function () {
        Route::get('/dashboard', '\App\Http\Controllers\DashboardController@dashboard')->name('dashboard');
    });
});


Auth::routes(['verify' => true]);

require __DIR__ . '/auth.php';
