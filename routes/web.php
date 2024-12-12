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



Route::get('/bai2', [Bai2Controller::class, 'index'])->name('bai2.index');
Route::get('/bai3', [Bai3Controller::class, 'index'])->name('bai3.index');
Route::get('/bai4', [Bai4Controller::class, 'index'])->name('bai4.index');