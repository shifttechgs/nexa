<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\QuoteRequestController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\ServiceController;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/services', [ServiceController::class, 'index'])->name('services.index');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

Route::get('/regions/{region}', [RegionController::class, 'show'])->name('regions.show');

Route::get('/insights',[PostController::class, 'index'])->name('posts.index');
Route::get('/insights/{post}', [PostController::class, 'show'])->name('posts.show');

Route::view('/contact', 'contact')->name('contact');

Route::post('/quote-requests',[QuoteRequestController::class, 'store'])->middleware('throttle:5,1')->name('quote-requests.store');

if (config('app.debug')) {
    Route::get('/dev/testimonials-wall', function () {
        $testimonials = Testimonial::all();

        return view('dev.testimonials-wall', compact('testimonials'));
    })->name('dev.testimonials-wall');

    // Design concept: the home page and 404 rebuilt around the supply route.
    Route::view('/dev/concept', 'dev.concept')->name('dev.concept');
    Route::view('/dev/concept-404', 'dev.concept-404')->name('dev.concept-404');
}
