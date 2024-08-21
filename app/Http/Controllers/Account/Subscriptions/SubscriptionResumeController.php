<?php

namespace App\Http\Controllers\Account\Subscriptions;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SubscriptionResumeController extends Controller
{
    public function index(): View
    {
        return view('account.subscriptions.resume');
    }

    public function store(Request $request)
    {
        $subscription = $request->user()->subscription();

        $this->authorize('resume', $subscription);

        $subscription->resume();

        return redirect()->route('account.subscriptions');
    }
}
