<?php

namespace App\Http\Controllers\Account\Subscriptions;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;
use Laravel\Cashier\Exceptions\IncompletePayment;

class SubscriptionSwapController extends Controller
{
    public function index(Request $request)
    {
        $plans = Plan::query()->where('slug', '!=', $request->user()->plan->slug)->get();
        return view('account.subscriptions.swap', compact('plans'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'plan' => 'required|exists:plans,slug',
        ]);

        try {
            $request->user()->subscription()->swap(
                Plan::query()->where('slug', $request->plan)->first()->stripe_id
            );
        } catch (IncompletePayment $e) {
            return redirect()->route('cashier.payment', [
                $e->payment->id,
                'redirect' => route('account.subscriptions')
            ])->with('message', 'An email has been sent with instructions on how to verify your payment.');
        }

        return redirect()->route('account.subscriptions');
    }
}
