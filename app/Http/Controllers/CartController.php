<?php

namespace App\Http\Controllers;
use App\Models\Mobile;
use App\Models\Order;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

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

    public function purchase(Request $request)
    {
        $mobilesInSession = $request->session()->get("mobiles");

        if ($mobilesInSession) {
            $userId = Auth::user()->getId();
            $order = new Order();
            $order->setUserId($userId);
            $order->setTotal(0);
            $order->save();
            $total = 0;
            $mobilesInCart = Mobile::findMany(array_keys($mobilesInSession));

            foreach ($mobilesInCart as $mobile) {
                $quantity = $mobilesInSession[$mobile->getId()];
                $item = new Item();
                $item->setQuantity($quantity);
                $item->setPrice($mobile->getPrice());
                $item->setMobileId($mobile->getId());
                $item->setOrderId($order->getId());
                $item->save();
                $total = $total + ($mobile->getPrice()*$quantity);
            }
            
            $order->setTotal($total);
            $order->save();
            
            $newBalance = Auth::user()->getBalance() - $total;
            Auth::user()->setBalance($newBalance);
            Auth::user()->save();

            $request->session()->forget('products');

            $viewData = [];
            $viewData["title"] = "Purchase - Online Store";
            $viewData["subtitle"] = "Purchase Status";
            $viewData["order"] = $order;

            return view('cart.purchase')->with("viewData", $viewData);
        
        } else {
            return redirect()->route('cart.index');
        }
    }

    public function pdf($id)
    {
        //$viewData = [];
        //$viewData["title"] = "My Orders";
        //$viewData["subtitle"] = "My Orders";
        //$viewData["order"] = Order::findOrFail($id);
        //$viewData["orders"] = Order::where('id', $id)->get();
        $order = Order::findOrFail($id);
        $pdf = PDF::loadView('cart.pdf',['order'=>$order]);
        //$pdf->loadHTML('<h1>Test</h1>');
        return $pdf->stream();
        //return view('cart.pdf')->with("viewData", $viewData);
    }

}