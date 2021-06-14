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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

// Main route group
Route::group(['middleware' => 'auth'], function() 
{
    // Admin route group
    Route::group([
        'prefix' => 'admin',
        'middleware' => 'is_admin',
        'as' => 'admin',
    ], function()
    {
        // Route to /properties/
        Route::resource('properties', 'App\Http\Controllers\Admin\PropertyController');
        // Route to /users/
        Route::resource('users', 'App\Http\Controllers\Admin\UserController');
    });
    
    // User route group
    Route::group([
        'prefix' => 'user',
        'as' => 'user',
    ], function()
    {
        // Route to /properties/
        Route::get('properties', [\App\Http\Controllers\User\PropertyController::class, 'index'])->name('properties.index');
    });
});