<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
│ Static “pages” presented by the main navbar
│ ───────────────────────────────────────────
│ Using Route::view keeps the file terse. Each
│ route is named so Blade (and tests) don’t
│ rely on hard-coded paths.
*/
Route::view('/',          'pages.home.home')->name('home');
Route::view('/mens',      'pages.mens')->name('mens');
Route::view('/womens',    'pages.womens')->name('womens');
Route::view('/about-us',  'pages.about')->name('about');
Route::view('/events',    'pages.events')->name('events');

/*
│ Dashboard (Breeze) — already scaffolded
*/
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/*
│ Profile CRUD protected by auth middleware
*/
Route::middleware('auth')->group(function () {
    Route::get   ('/profile',        [ProfileController::class, 'edit' ])->name('profile.edit');
    Route::patch ('/profile',        [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile',        [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
│ ─────────────── STUB PAGES (para hoy) ───────────────
│ El navbar ya apunta a estas rutas sin lanzar 404.
│ Crea las vistas en resources/views/pages/cart.blade.php
│ y wishlist.blade.php con un simple “Coming soon…”.
*/
Route::get('/cart', function () {
    return view('pages.cart');          // resources/views/pages/cart.blade.php
})->name('cart');

Route::middleware('auth')->get('/wishlist', function () {
    return view('pages.wishlist');      // resources/views/pages/wishlist.blade.php
})->name('wishlist');


/*
│ Breeze auth routes
*/
require __DIR__.'/auth.php';
