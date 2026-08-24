<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuoteRequestController;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

Route::get('/insights', [PostController::class, 'index'])->name('posts.index');
Route::get('/insights/{post}', [PostController::class, 'show'])->name('posts.show');

Route::post('/quote-requests', [QuoteRequestController::class, 'store'])->name('quote-requests.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

if (config('app.debug')) {
    Route::get('/dev/testimonials-wall', function () {
        $testimonials = Testimonial::published()->orderBy('sort')->get();

        return view('dev.testimonials-wall', compact('testimonials'));
    })->name('dev.testimonials-wall');
}

require __DIR__.'/auth.php';
