<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mobile;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\ImageStorage;

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
        $mobileData = $request->only(
            [
                "name", "price", "brand", "model", "color", "ramMemory", "storage"
            ]
        );
        $mobileData["imgName"] = $mobileData["name"] . "." . $request->file('imgName')->extension();
        Mobile::create($mobileData);
        $storeInterface = app(ImageStorage::class);
        $storeInterface->store($request, $mobileData["imgName"]);
        return back()->with('message', "Item created successfully");
    }

    public function edit($id)
    {
        $viewData = [];
        $viewData["title"] = "Admin Page - Edit mobile - Online Store";
        $viewData["mobile"] = Mobile::findOrFail($id);
        return view('admin.mobile.edit')->with("viewData", $viewData);
    }

    public function update(Request $request, $id)
    {
        Mobile::validate($request);
        $mobile = Mobile::findOrFail($id);
        $mobile->setName($request->input('name'));
        $mobile->setPrice($request->input('price'));
        $mobile->setBrand($request->input('brand'));
        $mobile->setModel($request->input('model'));
        $mobile->setColor($request->input('color'));
        $mobile->setRamMemory($request->input('ramMemory'));
        $mobile->setStorage($request->input('storage'));
        $mobile->setImgName($mobile->getName() . "." . $request->file('imgName')->extension());
        $storeInterface = app(ImageStorage::class);
        $storeInterface->store($request, $mobile->getImgName());
        $mobile->save();
        return redirect()->route('admin.mobile.index');
    }
}
