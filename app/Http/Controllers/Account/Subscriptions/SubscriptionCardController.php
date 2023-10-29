<?php

namespace App\Http\Controllers\Account\Subscriptions;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SubscriptionCardController extends Controller
{
    public function index(Request $request)
    {
        return view('account.subscriptions.card', [
            'intent' => $request->user()->createSetupIntent(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        request()->validate($request, [
            'token' => 'required',
        ]);

        $request->user()->updateDefaultPaymentMethod($request->token);

        return redirect()->route('account.subscriptions');
    }
}
