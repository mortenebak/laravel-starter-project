<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('admin')->as('admin.')->middleware(['auth'])->group(function () {

    Route::get('/', \App\Http\Livewire\Admin\Dashboard::class)->name('dashboard');
    Route::get('/users', \App\Http\Livewire\Admin\Users::class)->name('users');
    Route::get('/roles', \App\Http\Livewire\Admin\Roles::class)->name('roles');
    Route::get('/permissions', \App\Http\Livewire\Admin\Permissions::class)->name('permissions');

});
