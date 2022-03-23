<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobile;

class MobileController extends Controller
{

    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Mobiles - Online Store";
        $viewData["subtitle"] =  "List of Mobiles";
        $viewData["mobiles"] = Mobile::all();
        return view('mobiles.index')->with("viewData", $viewData);
    }

    public function show($id)
    {
        $viewData = [];
        $mobile = Mobile::findOrFail($id);
        $viewData["title"] = $mobile["name"]." - Online Store";
        $viewData["subtitle"] =  $mobile["name"]." - ".$mobile->getModel();
        $viewData["mobile"] = $mobile;
        return view('mobiles.show')->with("viewData", $viewData);
    }
    public function search(Request $request)
    {
        if($request->filled('search')){
            $mobiles = Mobile::search($request->search)->get();
        }else{
            $mobiles = Mobile::get()->take('5');
        }
        $viewData = [];
        $viewData['mobiles'] = $mobiles;
          
        return view('mobiles.search')->with("viewData", $viewData);
    }

    public function top(){
        $viewData =[];
        $viewData["title"] = "Mobiles - Online Store";
        $viewData["subtitle"] =  "Hot of Mobiles";
        $mobiles = Mobile::withCount('reviews')->orderBy('reviews_count', 'desc')->take('4')->get();
        $viewData['mobiles'] = $mobiles;
        return view('mobiles.top')->with("viewData", $viewData);
    }
    public function lowerPrices(){
        $viewData =[];
        $viewData["title"] = "Mobiles - Online Store";
        $viewData["subtitle"] =  "Cheapest Mobiles";
        $mobiles = Mobile::orderBy('price', 'asc')->take('3')->get();
        $viewData['mobiles'] = $mobiles;
        return view('mobiles.top')->with("viewData", $viewData);
    }
}
