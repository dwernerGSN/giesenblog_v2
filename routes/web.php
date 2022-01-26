<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/blogs', [BlogController::class, 'index'])->middleware(['auth', 'verified'])->name('blogs');

Route::get('/blogs/{id}', [BlogController::class, 'show']);

Route::get('/blogs/create', [BlogController::class, 'create']);

Route::get('/blogs/{id}/edit', [BlogController::class, 'edit']);

Route::post('blogs/store', [BlogController::class, 'store']);

Route::delete('blogs/{id}/delete', [BlogController::class, 'delete']);

require __DIR__.'/auth.php';
