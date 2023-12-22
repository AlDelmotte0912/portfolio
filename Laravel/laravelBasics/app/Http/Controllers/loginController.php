<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class loginController extends Controller
{

    public function index(): View
    {
        $users = DB::table('users')->get();

        return view('login', ['users' => $users]);
    }
}
