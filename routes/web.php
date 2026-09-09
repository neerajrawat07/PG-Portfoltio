<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PortfolioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Priyanka Garg — Digital Marketing Portfolio
|--------------------------------------------------------------------------
*/

Route::get('/', [PortfolioController::class, 'index'])->name('home');

Route::get('/case-study/avni', [PortfolioController::class, 'caseStudy'])->name('case-study.avni');

// Convenience alias without trailing slash variants
Route::redirect('/case-study-avni', '/case-study/avni');

/*
|--------------------------------------------------------------------------
| Borg (no-op with @laravel/breeze) / RedBull legacy route
|--------------------------------------------------------------------------
*/
Route::get('/redbull', function () {
    return redirect()->route('home');
})->name('redbull');

/*
|--------------------------------------------------------------------------
| Breeze user routes (kept for the admin/auth scaffolding)
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Admin panel
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {
    // Guest routes
    Route::middleware('guest')->group(function () {
        Route::get('/login', [App\Http\Controllers\admin\Auth\AdminLoginController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [App\Http\Controllers\admin\Auth\AdminLoginController::class, 'login'])->name('login.post');
    });

    // Authenticated admin routes
    Route::middleware('admin')->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        Route::post('/logout', [App\Http\Controllers\admin\Auth\AdminLoginController::class, 'logout'])->name('logout');

        Route::get('/profile', [App\Http\Controllers\admin\AdminProfileController::class, 'edit'])->name('profile');
        Route::put('/profile', [App\Http\Controllers\admin\AdminProfileController::class, 'update'])->name('profile.update');

        Route::resource('testimonials', App\Http\Controllers\admin\AdminTestimonialController::class)->except(['show']);
    });
});

require __DIR__.'/auth.php';