<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;


class OdeController extends Controller
{
    public function index()
    {
        $urun = Cart::content();
        return view('ode',compact($urun));
    }
}
