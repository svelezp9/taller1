<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller

{
    public function create($mobileid)

    {
        $viewData = []; //to be sent to the view
        $viewData["title"] = "Create Review";
        $viewData['mobile_id'] = $mobileid;
        return view('Review.create')->with("viewData", $viewData);
    }

    public function save(Request $request, $mobileid)
    {
        Review::validate($request);
        $reviewData = $request->only(["comment","rating"]);
        $reviewData['mobile_id'] = $mobileid;
        Review::create($reviewData);
        return back()->with('success', "Item created successfully");
    }
}