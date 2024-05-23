<?php

namespace App\Http\Controllers\TenantControllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\Tenant;
use App\Models\Subscription;
use Stancl\Tenancy\Facades\Tenancy;

class DashboardController extends Controller
{
    public function showDashboard()
    {
        try {
            // Initialize tenancy to get the current tenant
            $tenant = tenancy()->tenant;
            $tenantName = $tenant->tenant_city; // Assuming 'tenant_city' is a field in your Tenant model

            // Fetch the subscription details
            $subscription = Subscription::find($tenant->subscription_id);

            // Pass the tenant name and subscription to the view
            return view('tenantviews.tenantdash.tenantdashboard', compact('tenantName', 'subscription'));
        } catch (\Exception $e) {
            // Log the error
            Log::error('Error: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Unable to load dashboard.');
        }
    }
}
