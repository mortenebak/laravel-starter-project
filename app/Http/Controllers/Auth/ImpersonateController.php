<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ImpersonateController extends Controller
{
    public function impersonate(User $user)
    {
        // Ensure the authenticated user is a super admin
        if (! Auth::user()->hasPermissionTo('impersonate users')) {
            abort(403, 'Unauthorized');
        }

        // Store the current user ID in the session
        session(['admin_user_id' => Auth::id()]);

        // Log in as the target user
        Auth::loginUsingId($user->id);

        if (Auth::user()->hasPermissionTo('access dashboard')) {
            return redirect(route('admin.dashboard'));
        }

        return redirect(route('home'));
    }

    public function stopImpersonating()
    {
        // Get the previous user ID from the session
        $previousUserId = session('admin_user_id');

        // Log back in as the previous user
        Auth::loginUsingId($previousUserId);

        // Remove the previous user ID from the session
        session()->forget('admin_user_id');

        return redirect(route('admin.dashboard'));
    }
}
