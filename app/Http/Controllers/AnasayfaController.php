<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Urun;
use App\Models\UrunDetay;


class AnasayfaController extends Controller
{
    public function index()
    {
        $kategoriler = Kategori::whereRaw('parent_category_id is null')->take(8)->get();

        $slider = UrunDetay:: where('slider_mi',true)->take(5)->get();

        $gunun_firsati = Urun:: select('urun.*')
            ->join('urun_detay','urun_detay.urun_id','urun.id')
            ->where('urun_detay.gunun_firsati_mi',true)
            ->orderBy('updated_at','desc')
            ->first();

        $one_cikan_urunler = UrunDetay:: with('urun') -> where('one_cikan_mi',true)->take(4)->get();
        $cok_satan_urunler = UrunDetay:: with('urun') -> where('cok_satan_mi',true)->take(4)->get();
        $indirimli_urunler = UrunDetay:: with('urun') -> where('indirimli_mi',true)->take(4)->get();


        //$kategoriler = Kategori::all();//->take(8);
        return view('anasayfa',compact('kategoriler','one_cikan_urunler','cok_satan_urunler','indirimli_urunler','slider','gunun_firsati'));
    }
}
