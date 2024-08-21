<?php

namespace App\Http\Controllers\Account\Subscriptions;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SubscriptionCancelController extends Controller
{
    public function index(): View
    {
        return view('account.subscriptions.cancel');
    }

    public function store(Request $request)
    {
        $subscription = $request->user()->subscription();

        $this->authorize('cancel', $subscription);

        $subscription->cancel();

        return redirect()->route('account.subscriptions');
    }
}
