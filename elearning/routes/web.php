<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ArtikelController;
use App\Http\Controllers\Api\TagController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/artikel', [ArtikelController::class, 'index'])->name('admin.artikel.index');
Route::get('/admin/artikel/create', [ArtikelController::class, 'create'])->name('admin.artikel.create');
Route::post('/admin/artikel', [ArtikelController::class, 'store'])->name('admin.artikel.store');
Route::get('/admin/artikel/{id}/edit', [ArtikelController::class, 'edit'])->name('admin.artikel.edit');
Route::put('/admin/artikel/{id}', [ArtikelController::class, 'update'])->name('admin.artikel.update');
Route::delete('/admin/artikel/{id}', [ArtikelController::class, 'destroy'])->name('admin.artikel.destroy');

Route::get('/admin/tag', [TagController::class, 'index'])->name('admin.tag.index');
Route::get('/admin/tag/create', [TagController::class, 'create'])->name('admin.tag.create');
Route::post('/admin/tag', [TagController::class, 'store'])->name('admin.tag.store');
Route::get('/admin/tag/{id}/edit', [TagController::class, 'edit'])->name('admin.tag.edit');
Route::put('/admin/tag/{id}', [TagController::class, 'update'])->name('admin.tag.update');
Route::delete('/admin/tag/{id}', [TagController::class, 'destroy'])->name('admin.tag.destroy');
