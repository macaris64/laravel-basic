<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Urun;


class AnasayfaController extends Controller
{
    public function index()
    {
        $kategoriler = Kategori::whereRaw('parent_category_id is null')->take(8)->get();

        $one_cikan_urunler = Urun:: where('one_cikan_mi',true)->take(4)->get();

        //$kategoriler = Kategori::all();//->take(8);
        return view('anasayfa',compact('kategoriler','one_cikan_urunler'));
    }
}
