<?php

namespace App\Http\Controllers\TenantControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TenantLoginController extends Controller
{
    public function tenantlogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->route('tenantdashboard');
        }

        // Authentication failed...
        return redirect()->back()->withInput()->withErrors(['email' => 'Invalid credentials']);
    }

    public function tenantlogout()
    {
        Auth::logout();
        return redirect()->route('tenantlogin');
    }
}
