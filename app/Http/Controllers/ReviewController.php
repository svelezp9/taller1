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
        return view('review.create')->with("viewData", $viewData);
    }

    public function save(Request $request, $mobileid)
    {
        Review::validate($request);
        $reviewData = $request->only(["comment","rating"]);
        $reviewData['mobile_id'] = $mobileid;
        Review::create($reviewData);
        return back()->with('message', "Item created successfully");
    }
    public function updateData($id)

    {
        $viewData = []; //to be sent to the view
        $viewData["title"] = "Update Review";
        $viewData['review'] = Review::findOrFail($id);
        return view('review.update')->with("viewData", $viewData);
    }
    public function update(Request $request, $id)
    {
        Review::validate($request);
        $reviewData = $request->only(["comment","rating"]);
        $reviewData['id'] = $id;
        Review::whereId($id)->update($reviewData);
        return back()->with('message', "Item updated successfully");
    }
    public function delete($id)
    {
        Review::destroy($id);
        return back()->with('message', "Item deleted successfully");
    }
}