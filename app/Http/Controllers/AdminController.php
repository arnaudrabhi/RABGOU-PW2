<?php

namespace App\Http\Controllers;

use App\Models\Eleve;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function showAdminMenu() {
        $eleves = Eleve::all();
        return view('admin.admin-back-office', compact('eleves'));
    }
}
