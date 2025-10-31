<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function dashboard()
    {
$blogs=Blog::count();

        return view("admin.dashboard.index",compact('blogs'));
    }
}
