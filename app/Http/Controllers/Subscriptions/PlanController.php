<?php

namespace App\Http\Controllers\Subscriptions;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Contracts\View\View;

class PlanController extends Controller
{
    public function index(): View
    {
        $plans = Plan::get();

        return view('subscriptions.plans', [
            'plans' => $plans,
        ]);
    }
}
