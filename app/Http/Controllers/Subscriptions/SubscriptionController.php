<?php

namespace App\Http\Controllers\Subscriptions;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Rules\ValidCoupon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Laravel\Cashier\Exceptions\IncompletePayment;

class SubscriptionController extends Controller
{
    public function index(Request $request): View
    {
        return view('subscriptions.checkout', [
            'intent' => $request->user()->createSetupIntent(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'coupon' => [
                'nullable',
                new ValidCoupon,
            ],
            'plan' => 'required|exists:plans,slug',
        ]);

        $plan = Plan::query()
            ->where('slug', $request->get('plan', 'pro-monthly'))
            ->first();

        try {
            $request->user()->newSubscription('default', $plan->stripe_id)
                ->withCoupon($request->coupon)
                ->create($request->token);
        } catch (IncompletePayment $e) {
            return redirect()->route('cashier.payment', [
                $e->payment->id,
                'redirect' => route('account.subscriptions'),
            ])->with('message', 'An email has been sent with instructions on how to verify your payment.');
        }

        return back();
    }
}
