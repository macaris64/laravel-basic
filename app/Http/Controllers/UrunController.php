<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Urun;
use Illuminate\Support\Facades\Session;


class UrunController extends Controller
{
    public function index($slug)
    {
        $urun = Urun::where('slug', $slug)->firstOrFail();
        $kategoriler = $urun->kategoriler()->distinct()->get();
        //$urun = Urun::whereSlug($slug)->firstOrFail();

        session(['urun_id' => $urun->id]);

        return view('urun',compact('urun','kategoriler' ));
    }

    public function ara()
    {
        $aranan = request()->input('aranan');
        $urunler = Urun::where('name','like','%'.$aranan.'%')
            ->orWhere('aciklama','like','%'.$aranan.'%')
            ->paginate(8);
            //->get();
        $urunCount = Urun::where('name','like','%'.$aranan.'%')
            ->orWhere('aciklama','like','%'.$aranan.'%')
            ->count();
        //->get();
        request()->flash();
        return view('arama',compact('urunler','urunCount'));
    }
}
