<?php

use Illuminate\Support\Facades\Route;

// Main
Route::get('/', 'listPosts')->name('listPosts');

// Post CRUD
// Route::get('/show/{post}', 'show')->name('show');

// Route::get('/create', 'create')->name('create');
// Route::post('/store', 'store')->name('store');

// Route::get('/edit/{post}', 'edit')->name('edit');
// Route::post('/update', 'update')->name('update');

// Route::post('/delete/{post}', 'destroy')->name('destroy');