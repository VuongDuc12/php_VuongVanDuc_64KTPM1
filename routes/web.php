<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Bai1Controller;
use App\Http\Controllers\Bai2Controller;
use App\Http\Controllers\Bai3Controller;
use App\Http\Controllers\Bai4Controller;
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