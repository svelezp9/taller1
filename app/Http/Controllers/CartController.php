<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Mobile;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $total = 0;
        $mobilesInCart = [];
        $ids = $request->session()->get("mobiles"); //we get the ids of the mobiles stored in session
        if($ids){
            $mobilesInCart = Mobile::findMany(array_keys($ids));
            $total = Mobile::sumPricesByQuantities($mobilesInCart, $ids);
        }

        $viewData = [];
        $viewData["title"] = "Cart - Mobile Store";
        $viewData["subtitle"] =  "Your Shopping Cart";
        $viewData["total"] = $total;
        $viewData["mobilesInCart"] = $mobilesInCart;

        return view('cart.index')->with("viewData",$viewData);
    }

    public function add(Request $request, $id)
    {
        $mobiles = $request->session()->get("mobiles");
        //$mobiles[$id] = $id;
        $mobiles[$id] = $request->input('quantity');
        $request->session()->put('mobiles', $mobiles);
        return back();
    }

    public function removeAll(Request $request)
    {
        $request->session()->forget('mobiles');
        return back();
    }
}