<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->role_id == 1) {
            return view('admin.dashboard.admin');
        } elseif ($user->role_id == 2) {

            return view('admin.dashboard.council');
        } elseif ($user->role_id == 3) {
            return view('admin.dashboard.business');

        }
    }
}
