<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminDashController extends Controller
{
    /**
     * Return the admin dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dash()
    {
        return view('admin.dashboard');
    }
}
