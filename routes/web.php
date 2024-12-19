<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Bai1Controller;
use App\Http\Controllers\Bai2Controller;
use App\Http\Controllers\Bai3Controller;
use App\Http\Controllers\Bai4Controller;
use App\Http\Controllers\Btth04Controller;
Route::get('/', function () {
    return view('home');
});
Route::get('/bai1', [Bai1Controller::class, 'index'])->name('bai1.index');
Route::get('/bai1/libraries', [Bai1Controller::class, 'libraries'])->name('bai1Libraries.index');

Route::get('/bai1/books', [Bai1Controller::class, 'books'])->name('bai1Books.index');
Route::get('/bai1/books/create', [Bai1Controller::class, 'create'])->name('bai1Books.create');
Route::post('/bai1/books/store', [Bai1Controller::class, 'store'])->name('bai1Books.store');
Route::get('/bai1/books/{id}/edit', [Bai1Controller::class, 'edit'])->name('bai1Books.edit');
Route::put('/bai1/books/{id}', [Bai1Controller::class, 'update'])->name('bai1Books.update');
Route::delete('/bai1/books/{id}', [Bai1Controller::class, 'destroy'])->name('bai1Books.destroy');



Route::get('/bai2', [Bai2Controller::class, 'index'])->name('bai2.index');
Route::get('/bai3', [Bai3Controller::class, 'index'])->name('bai3.index');
Route::get('/bai4', [Bai4Controller::class, 'index'])->name('bai4.index');



Route::get('/btth04', [Btth04Controller::class, 'index'])->name('btth04.index');

Route::get('/btth04/create', [Btth04Controller::class, 'create'])->name('btth04.create');
Route::post('/btth04/store', [Btth04Controller::class, 'store'])->name('btth04.store');
Route::get('/btth04/{id}/edit', [Btth04Controller::class, 'edit'])->name('btth04.edit');


Route::put('/btth04/{id}', [Btth04Controller::class, 'update'])->name('btth04.update');

Route::delete('/btth04/{id}', [Btth04Controller::class, 'destroy'])->name('btth04.destroy');

