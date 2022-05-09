<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class ProfileController extends Controller
{

    public function index()
    {
        $viewData = [];
        $userId = Auth::user()->getId();
        $user = User::findOrFail($userId);
        $viewData["name"] = $user->getName();
        $viewData["balance"] = $user->getBalance();
        $viewData["email"] = $user->getEmail();
        return view('profile.index')->with("viewData", $viewData);
    } 

}