<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SearchController;
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

// Main Page
Route::get('/', [PageController::class, 'index'])->name('index');

// Home Page
Route::get('/home', [PageController::class, 'home'])->name('home');

// Contact Page
Route::get('/contact', [ContactController::class, 'index'])->name('contact');

// Contact Form Validation
Route::post('/contact/validate', [ContactController::class, 'validateContactRequest'])->name('validateContact');

// Search
Route::get('/search', [SearchController::class, 'search'])->name('search');

// Dashboard
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
        // prefix every URL in this group with /user/
        'prefix' => 'user',
        'as' => 'user',
    ], function()
    {
        Route::get('{id}', [\App\Http\Controllers\User\ProfileController::class, 'show']);
        Route::get('{id}/edit', [\App\Http\Controllers\User\ProfileController::class, 'edit']);
        Route::put('{id}/update', [\App\Http\Controllers\User\ProfileController::class, 'update']);
        Route::delete('{id}/delete', [\App\Http\Controllers\User\ProfileController::class, 'destroy']);
    });

    

});

// Route to Properties
Route::resource('properties', 'App\Http\Controllers\User\PropertyController');