<?php

namespace App\Http\Controllers\Account\Subscriptions;

use App\Http\Controllers\Controller;
use App\Rules\ValidCoupon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SubscriptionCouponController extends Controller
{
    public function index(): View
    {
        return view('account.subscriptions.coupon');
    }

    public function store(Request $request)
    {
        request()->validate($request, [
            'coupon' => [
                'required',
                new ValidCoupon,
            ],
        ]);

        $request->user()->subscription()->updateStripeSubscription([
            'coupon' => $request->coupon,
        ]);

        return redirect()->route('account.subscriptions');
    }
}
