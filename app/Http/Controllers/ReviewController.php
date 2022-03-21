<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Mobile;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller

{
    public function create($mobileid)

    {
        $viewData = []; //to be sent to the view
        $viewData["title"] = "Create Review";
        $viewData['mobile_id'] = $mobileid;
        return view('reviews.create')->with("viewData", $viewData);
    }

    public function save(Request $request, $mobileId)
    {
        Review::validate($request);
        $reviewData = $request->only(["comment","rating"]);
        $reviewData['mobile_id'] = $mobileId;
        $reviewData['user_id'] = Auth::id();
        Review::create($reviewData);
        return back()->with('message', "Review created successfully");
    }
    public function delete($id)
    {
        Review::destroy($id);
        return back()->with('message', "Review deleted successfully");
    }
}