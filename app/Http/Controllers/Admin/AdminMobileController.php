<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mobile;
use Illuminate\Support\Facades\Auth;

class AdminMobileController extends Controller

{

    public function index()

    {
        $viewData = [];
        $viewData["title"] = "mobiles";
        $viewData["subtitle"] = "List of mobiles";
        $viewData["mobiles"] = Mobile::all();
        return view('admin.mobile.index')->with("viewData", $viewData);
    }

    public function show($id)

    {
        $viewData = [];
        $mobile = Mobile::findOrFail($id);
        $viewData["title"] = $mobile->getName() . " - Online Store";
        $viewData["subtitle"] = $mobile->getName() . " - mobile information";
        $viewData["mobile"] = $mobile;
        return view('admin.mobile.show')->with("viewData", $viewData);
    }

    public function create()

    {
        $viewData = []; //to be sent to the view
        $viewData["title"] = "Create mobile";
        $viewData["user"] = Auth::user();
        return view('admin.mobile.create')->with("viewData", $viewData);
    }

    public function save(Request $request)
    {
        Mobile::validate($request);
        $mobileData = $request->only(["name","price","brand","model","color","ramMemory","storage","imgName"]);
        Mobile::create($mobileData);
        return back()->with('message', "Item created successfully");
    }
}
