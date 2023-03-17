<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    function index(){
        return view('users.usersWelcome');
    }
}
