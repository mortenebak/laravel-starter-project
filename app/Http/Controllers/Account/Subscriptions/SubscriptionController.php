<?php

namespace App\Http\Controllers\Account\Subscriptions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {

        return view('account.subscriptions.index', [
            'subscription' => $request->user()->presentSubscription(),
            'invoice' => $request->user()->presentUpcomingInvoice(),
            'customer' => $request->user()->presentCustomer(),
        ]);
    }
}
