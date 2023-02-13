<?php

use Illuminate\Support\Facades\Route;

// Homepage
Route::get('/', 'index')->name('home');

// Post CRUD
Route::get('/show/{post}', 'show')->name('show');

Route::get('/create', 'create')->name('create');
Route::post('/store', 'store')->name('store');

Route::get('/edit/{post}', 'edit')->name('edit');
Route::post('/update', 'update')->name('update');

Route::post('/delete/{post}', 'destroy')->name('destroy');

Route::post('/delimg/{post}', 'deleteImage')->name('deleteImage');
