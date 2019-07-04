<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Urun;


class UrunController extends Controller
{
    public function index($slug)
    {
        $urun = Urun::where('slug', $slug)->firstOrFail();
        $kategoriler = $urun->kategoriler()->distinct()->get();
        //$urun = Urun::whereSlug($slug)->firstOrFail();

        return view('urun',compact('urun','kategoriler' ));
    }
}
