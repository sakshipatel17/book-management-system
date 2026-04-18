<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartPdf;
use App\Models\Logins;
class CheckoutController extends Controller
{
    public function index()
    {
        CartPdf::query()->delete();
        $cartItem = session()->get('cart');
        foreach ($cartItem as $key => $c) 
        {
            $bkname = $c['name'];
            $qty = $c['quantity'];
            $price = $c['price'];
            
            $cartRec = new CartPdf;
            $cartRec->billid = 1;
            $cartRec->bookname = $bkname;
            $cartRec->price = $price;
            $cartRec->quantity = $qty;
            $cartRec->total = ($price * $qty);
            $cartRec->save();
        }
        $cartItems = CartPdf::all();
        $currentUser = Logins::where('id','=',session()->get('session_user_id'))->get();
        return view('checkout', compact(['cartItems','currentUser'])); 
    }
}
