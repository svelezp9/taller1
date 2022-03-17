<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class AdminHomeController extends Controller

{

    public function index()

    {
        $user = Auth::user();
        return view('admin.home.index')->with("user", $user);
    }
}
