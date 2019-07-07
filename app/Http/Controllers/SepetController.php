<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Urun;

class SepetController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('sepet');
    }
    public function ekle()
    {
        $urun_id = Session::get('urun_id');
        $urun = Urun::where('id',$urun_id)->first();

        Cart::add($urun_id, $urun->name, 1, $urun->fiyat,0,array('href'=> $urun->slug));

        //var_dump(Cart::content());
        //exit();
        return redirect()->route('sepet')->with('mesaj','Ürün sepete eklendi');
    }

    public function ajaxQtyArttir()
    {
        $urun_id = request('urun_id');
        // güncel qty al
        $qty = Cart::get($urun_id)->qty;
        $qty = $qty + 1;
        Cart::update($urun_id, $qty); // Will update the quantity

        return view('sepet');
    }


    public function ajaxQtyAzalt()
    {
        $urun_id = request('urun_id');
        // güncel qty al
        $qty = Cart::get($urun_id)->qty;
        $qty = $qty - 1;
        Cart::update($urun_id, $qty); // Will update the quantity

        return view('sepet');
    }

    public function ajaxSepetUrunSil()
    {
        $urun_id = request('urun_id');


        Cart::remove($urun_id); // Will update the quantity

        return view('sepet');
    }

    public function ajaxSepetBosalt()
    {
        Cart::destroy(); // Will update the quantity

        return view('sepet');
    }
}
