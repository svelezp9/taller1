<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobile;

class MobileController extends Controller

{

    public function index()

    {
        $viewData = [];
        $viewData["title"] = "mobiles";
        $viewData["subtitle"] = "List of mobiles";
        $viewData["mobiles"] = Mobile::all();
        return view('mobile.index')->with("viewData", $viewData);
    }

    public function show($id)

    {
        $viewData = [];
        $mobile = Mobile::findOrFail($id);
        $viewData["title"] = $mobile->getName() . " - Online Store";
        $viewData["subtitle"] = $mobile->getName() . " - mobile information";
        $viewData["mobile"] = $mobile;
        return view('mobile.show')->with("viewData", $viewData);
    }

    public function create()

    {
        $viewData = []; //to be sent to the view
        $viewData["title"] = "Create mobile";
        return view('mobile.create')->with("viewData", $viewData);
    }

    public function save(Request $request)
    {
        Mobile::validate($request);
        $mobileData = $request->only(["name","price","brand","model","color","ramMemory","storage","imgName"]);
        Mobile::create($mobileData);
        return back()->with('success', "Item created successfully");
    }
    public function delete($id)

    {
        $mobile = Mobile::findOrFail($id);
        $mobile->delete();
        return redirect('/mobile')->with('message', 'Móvil eliminado exitosamente!');
    }
}
