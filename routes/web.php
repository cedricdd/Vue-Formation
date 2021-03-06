<?php

use App\Http\Controllers\CourseController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::View('/shopping-list', 'ShoppingList.index')->name("shopping-list");
Route::View('/github-user', 'GithubUser.index')->name("github-user");
Route::View('/notification', 'Notification.index')->name("notification");

Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::resource('/courses', CourseController::class)->only( 'show', 'store', 'destroy');
    Route::post('/toggleProgress', [CourseController::class, 'toggleProgress']);

    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});
