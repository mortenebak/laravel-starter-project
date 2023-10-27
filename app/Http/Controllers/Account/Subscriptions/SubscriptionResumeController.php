<?php

namespace App\Http\Controllers\Account\Subscriptions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubscriptionResumeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'subscribed']);
    }

    public function index()
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
