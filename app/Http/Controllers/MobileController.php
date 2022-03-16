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
        $viewData["title"] = $mobile["name"] . " - Online Store";
        $viewData["subtitle"] = $mobile["name"] . " - mobile information";
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

        $request->validate([
            "name" => "required",
            "price" => "required",
            "brand" => "required",
            "model" => "required",
            "color" => "required",
            "ramMemory" => "required",
            "storage" => "required",
            "imgName" => "required",
        ]);
        Mobile::create($request->only(["name", "price","brand","model","color","ramMemory","storage","imgName"]));
        return back()->with('message', 'Móvil creado exitosamente!');
    }
    public function delete($id)

    {
        $mobile = Mobile::findOrFail($id);
        $mobile->delete();
        return redirect('/mobile')->with('message', 'Móvil eliminado exitosamente!');
    }
}
