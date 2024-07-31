<?php

namespace App\Http\Controllers\Subscriptions;

use App\Http\Controllers\Controller;
use App\Models\Plan;

class PlanController extends Controller
{
    public function index()
    {
        $plans = Plan::get();

        return view('subscriptions.plans', [
            'plans' => $plans,
        ]);
    }
}
