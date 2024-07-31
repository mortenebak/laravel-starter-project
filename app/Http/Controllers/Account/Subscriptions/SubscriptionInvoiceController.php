<?php

namespace App\Http\Controllers\Account\Subscriptions;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SubscriptionInvoiceController extends Controller
{
    public function index(Request $request): View
    {
        $invoices = $request->user()->invoices();

        return view('account.subscriptions.invoices', [
            'invoices' => $invoices,
        ]);
    }

    public function show(Request $request, string $id): RedirectResponse
    {
        return redirect($request->user()->findInvoice($id)->asStripeInvoice()->invoice_pdf);
    }
}
