<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class AdminReviewController extends Controller
{
    public function create($mobileid)
    {
        $viewData = []; //to be sent to the view
        $viewData["title"] = "Create Review";
        $viewData['mobile_id'] = $mobileid;
        return view('admin.review.create')->with("viewData", $viewData);
    }

    public function save(Request $request, $mobileId)
    {
        Review::validate($request);
        $reviewData = $request->only(["comment","rating"]);
        $reviewData['mobile_id'] = $mobileId;
        $reviewData['user_id'] = Auth::id();
        Review::create($reviewData);
        return back()->with('message', "Item created successfully");
    }
    public function updateData($id)
    {
        $viewData = []; //to be sent to the view
        $viewData["title"] = "Update Review";
        $viewData['review'] = Review::findOrFail($id);
        return view('admin.review.update')->with("viewData", $viewData);
    }
    public function update(Request $request, $id)
    {
        Review::validate($request);
        $reviewData = $request->only(["comment","rating"]);
        Review::whereId($id)->update($reviewData);
        return back()->with('message', "Item updated successfully");
    }
    public function delete($id)
    {
        Review::destroy($id);
        return back()->with('message', "Item deleted successfully");
    }
}
