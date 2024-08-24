<?php

use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\ImpersonateController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Middleware\NotSubscribed;
use App\Http\Middleware\Subscribed;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Passwords\Confirm;
use App\Livewire\Auth\Passwords\Email;
use App\Livewire\Auth\Passwords\Reset;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\Verify;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'welcome')->name('home');

Route::middleware('guest')->group(function () {
    Route::get('login', Login::class)
        ->name('login');

    Route::get('register', Register::class)
        ->name('register');
});

Route::get('password/reset', Email::class)
    ->name('password.request');

Route::get('password/reset/{token}', Reset::class)
    ->name('password.reset');

Route::middleware('auth')->group(function () {
    Route::get('email/verify', Verify::class)
        ->middleware('throttle:6,1')
        ->name('verification.notice');

    Route::get('password/confirm', Confirm::class)
        ->name('password.confirm');
});

Route::middleware('auth')->group(function () {
    Route::get('email/verify/{id}/{hash}', EmailVerificationController::class)
        ->middleware('signed')
        ->name('verification.verify');

    Route::post('logout', LogoutController::class)
        ->name('logout');

    Route::get('impersonate/{user}', [ImpersonateController::class, 'impersonate'])->middleware('can:impersonate users')->name('impersonate');
    Route::get('stop-impersonating', [ImpersonateController::class, 'stopImpersonating'])->middleware('auth')->name('stop-impersonating');

});

// Subscription and Account stuff
Route::group(['namespace' => 'Account', 'prefix' => 'account'], function () {
    Route::get('/', [\App\Http\Controllers\Account\AccountController::class, 'index'])->name('account')->middleware('auth');

    Route::group(['namespace' => 'Subscriptions', 'prefix' => 'subscriptions'], function () {
        Route::get('/', [\App\Http\Controllers\Account\Subscriptions\SubscriptionController::class, 'index'])->name('account.subscriptions')->middleware(['auth', NotSubscribed::class]);

        Route::get('cancel', [\App\Http\Controllers\Account\Subscriptions\SubscriptionCancelController::class, 'index'])->name('account.subscriptions.cancel')->middleware(['auth', Subscribed::class]);
        Route::post('cancel', [\App\Http\Controllers\Account\Subscriptions\SubscriptionCancelController::class, 'store'])->name('account.subscriptions.cancel.post')->middleware(['auth', Subscribed::class]);

        Route::get('resume', [\App\Http\Controllers\Account\Subscriptions\SubscriptionResumeController::class, 'index'])->name('account.subscriptions.resume')->middleware(['auth', Subscribed::class]);
        Route::post('resume', [\App\Http\Controllers\Account\Subscriptions\SubscriptionResumeController::class, 'store'])->name('account.subscriptions.resume.post')->middleware(['auth', Subscribed::class]);

        Route::get('invoices', [\App\Http\Controllers\Account\Subscriptions\SubscriptionInvoiceController::class, 'index'])->name('account.subscriptions.invoices')->middleware(['auth']);
        Route::get('invoices/{id}', [\App\Http\Controllers\Account\Subscriptions\SubscriptionInvoiceController::class, 'show'])->name('account.subscriptions.invoice')->middleware(['auth']);

        Route::get('swap', [\App\Http\Controllers\Account\Subscriptions\SubscriptionSwapController::class, 'index'])->name('account.subscriptions.swap');
        Route::post('swap', [\App\Http\Controllers\Account\Subscriptions\SubscriptionSwapController::class, 'store'])->name('account.subscriptions.swap.post');

        Route::get('card', [\App\Http\Controllers\Account\Subscriptions\SubscriptionCardController::class, 'index'])->name('account.subscriptions.card');
        Route::post('card', [\App\Http\Controllers\Account\Subscriptions\SubscriptionCardController::class, 'store'])->name('account.subscriptions.card.post');

        Route::get('coupon', [\App\Http\Controllers\Account\Subscriptions\SubscriptionCouponController::class, 'index'])->name('account.subscriptions.coupon');
        Route::post('coupon', [\App\Http\Controllers\Account\Subscriptions\SubscriptionCouponController::class, 'store'])->name('account.subscriptions.coupon.post');
    });
});

// Plans
Route::group(['namespace' => 'Subscriptions'], function () {
    Route::get('plans', [\App\Http\Controllers\Subscriptions\PlanController::class, 'index'])->name('subscriptions.plans');
    Route::get('subscriptions', [\App\Http\Controllers\Subscriptions\SubscriptionController::class, 'index'])->name('subscriptions');
    Route::post('subscriptions', [\App\Http\Controllers\Subscriptions\SubscriptionController::class, 'store'])->name('subscriptions.store');
});

//include __DIR__ . '/admin.php';
