<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        //dd($user->role_id);

        if ($user->role_id == 1) {
            //dd('admin');
            return view('admin.dashboard.admin');
        } elseif ($user->role_id == 2) {
            //dd('council');

            return view('admin.dashboard.business');
        } elseif ($user->role_id == 3) {
            //dd('business');
            return view('admin.dashboard.council');

        }

        //return view('admin.dashboard.admin');
    }
}
