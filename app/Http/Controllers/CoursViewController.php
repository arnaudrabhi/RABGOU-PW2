<?php

namespace App\Http\Controllers;

use App\Models\User;

class CoursViewController extends Controller
{
    function index() {
        return view('cours.cours_home');
    }
}
