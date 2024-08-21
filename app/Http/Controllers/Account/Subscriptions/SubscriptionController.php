<?php

namespace App\Http\Controllers\Account\Subscriptions;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function index(Request $request): View
    {
        return view('account.subscriptions.index', [
            'subscription' => $request->user()->presentSubscription(),
            'invoice' => $request->user()->presentUpcomingInvoice(),
            'customer' => $request->user()->presentCustomer(),
        ]);
    }
}
