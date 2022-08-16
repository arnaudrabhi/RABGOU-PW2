<?php

namespace App\Http\Controllers;

use App\Models\User;

class AdminController extends Controller
{
    function showAdminMenu() {
        $eleves = User::where('role_id', '=', '4')->get();
        return view('admin.admin-back-office', compact('eleves'));
    }
}
