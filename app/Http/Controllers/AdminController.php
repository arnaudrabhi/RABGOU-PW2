<?php

namespace App\Http\Controllers;

use App\Models\User;

class AdminController extends Controller
{
    function showAdminMenu() {
        return view('admin.admin-back-office');
    }
}
