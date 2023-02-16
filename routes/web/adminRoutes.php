<?php

use Illuminate\Support\Facades\Route;

// Main
Route::get('/posts', 'listPosts')->name('listPosts');
Route::get('/tags', 'listTags')->name('listTags');

Route::get('/tag/{tag}', 'show')->name('show');

Route::get('/tag/edit/{tag}', 'edit')->name('edit');
Route::post('/tag/update', 'update')->name('update');

Route::post('/tag/delete/{tag}', 'destroy')->name('destroy');
