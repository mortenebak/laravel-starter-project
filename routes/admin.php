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

Route::prefix('admin')->as('admin.')->middleware(['auth', 'can:access dashboard'])->group(function () {
    Route::get('/', \App\Livewire\Admin\Dashboard::class)->name('dashboard');
    Route::get('users', \App\Livewire\Admin\Users::class)->name('users')->middleware('can:view users');
    Route::delete('users/{user}', \App\Livewire\Admin\Users::class)->name('users.delete')->middleware('can:delete users');
    Route::get('roles', \App\Livewire\Admin\Roles::class)->name('roles')->middleware('can:view roles');
    Route::get('permissions', \App\Livewire\Admin\Permissions::class)->name('permissions')->middleware('can:view permissions');
    Route::get('profile', \App\Livewire\Admin\Profile\EditProfile::class)->name('profile.edit');
});
