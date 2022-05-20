<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Mobile;

class HomeController extends Controller
{

    public function index()
    {
        $viewData = [];
        $user = Auth::user();
        $mobilesTop = Mobile::withCount('reviews')->orderBy(
            'reviews_count',
            'desc'
        )->take('4')->get();
        $viewData['mobilesTop'] = $mobilesTop;
        $mobilesLower = Mobile::orderBy('price', 'asc')->take('3')->get();
        $viewData['mobilesLower'] = $mobilesLower;
        $viewData['user'] = $user;
        return view('home.index')->with("viewData", $viewData);
    }
}
