<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\BookIdentityController;
use App\Http\Controllers\BookKindController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

// Common Resource Routes:
// index - Show all listings
// show - Show single listing
// create - Show form to create new listing
// store - Store new listing
// edit - Show form to edit listing
// update - Update listing
// destroy - Delete listing  

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::controller(BookController::class)->group(function () {
    Route::get('books', 'index')->name('book-list');
    Route::get('books/create', 'create')->name('book-create');
    Route::post('books/store', 'store')->name('book-store');
    Route::get('books/{book}', 'show')->name('book-show');
    Route::get('books/{book}/edit', 'edit')->name('book-edit');
    Route::put('books/{book}/update', 'update')->name('book-update');
    Route::delete('books/{book}/destroy', 'destroy')->name('book-destroy');
});

Route::controller(BookKindController::class)->group(function () {
    Route::get('book-kinds', 'index')->name('book-kind-list');
    Route::get('book-kinds/create', 'create')->name('book-kind-create');
    Route::post('book-kinds/store', 'store')->name('book-kind-store');
    Route::get('book-kinds/{book_kind}', 'show')->name('book-kind-show');
    Route::get('book-kinds/{book_kind}/edit', 'edit')->name('book-kind-edit');
    Route::put('book-kinds/{book_kind}/update', 'update')->name('book-kind-update');
    Route::delete('book-kinds/{book_kind}/destroy', 'destroy')->name('book-kind-destroy');
});

Route::controller(BookIdentityController::class)->group(function () {
    Route::get('book-identities', 'index')->name('book-identity-list');
    Route::get('book-identities/create', 'create')->name('book-identity-create');
    Route::post('book-identities/store', 'store')->name('book-identity-store');
    Route::get('book-identities/{book_identity}', 'show')->name('book-identity-show');
    Route::get('book-identities/{book_identity}/edit', 'edit')->name('book-identity-edit');
    Route::put('book-identities/{book_identity}/update', 'update')->name('book-identity-update');
    Route::delete('book-identities/{book_identity}/destroy', 'destroy')->name('book-identity-destroy');
});
