<?php

use Illuminate\Support\Facades\Route;

// Main
Route::get('/posts', 'listPosts')->name('listPosts');
Route::get('/tags', 'listTags')->name('listTags');

Route::get('/edit/{tag}', 'edit')->name('edit');
Route::post('/update', 'update')->name('update');

Route::post('/delete/{tag}', 'destroy')->name('destroy');
