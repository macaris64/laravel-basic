<?php

namespace App\Http\Controllers;

use PhpParser\Node\Expr\Array_;
use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Urun;



class KategoriController extends Controller
{
    public function index($slug)
    {
        $kategori = Kategori::where('slug', $slug)->firstOrFail();
        $alt_kategoriler = Kategori::where('parent_category_id',$kategori->id)->get();

        $order = request('order');
        if ($order == 'coksatanlar')
        {
            $urunler = $kategori->urunler()
                ->join('urun_detay','urun_detay.urun_id','urun.id')
                ->orderBy('urun_detay.cok_satan_mi','desc')
                ->paginate(8);
        }
        elseif ($order == 'yeniurunler')
        {
            $urunler = $kategori->urunler()
                ->distinct()
                ->orderByDesc('updated_at')
                ->paginate(8);
        }
        elseif ($order == 'normal')
        {
            $urunler = $kategori->urunler()->paginate(8);

        }
        else
        {
            $urunler = $kategori->urunler()->paginate(8);
        }


        return view('kategori',compact('kategori','alt_kategoriler','urunler'));
    }
}
