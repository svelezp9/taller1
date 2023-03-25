<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Mobile;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{

    public function index()
    {
        /*
        $beers = Http::get('http://thecraftbeer.tk/api/v1/beers')->json();
        $beersURL = $beers["additionalData"]["home_page"];
        $beersArray = $beers["data"];*/
        $viewData = [];
        $user = Auth::user();
        $mobilesTop = Mobile::withCount('reviews')->orderBy(
            'reviews_count',
            'desc'
        )->take('4')->get();
        $viewData["random"] = random_int(0,20);
        /*
        $viewData["beers"] = $beersArray;
        $viewData["url"] = $beersURL;
         */
        $viewData['mobilesTop'] = $mobilesTop;
        $mobilesLower = Mobile::orderBy('price', 'asc')->take('3')->get();
        $viewData['mobilesLower'] = $mobilesLower;
        $viewData['user'] = $user;
        return view('home.index')->with("viewData", $viewData);
    }
}
