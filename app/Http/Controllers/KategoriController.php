<?php

namespace App\Http\Controllers;

use PhpParser\Node\Expr\Array_;
use Illuminate\Http\Request;
use App\Models\Kategori;


class KategoriController extends Controller
{
    public function index($slug)
    {
        $kategori = Kategori::where('slug', $slug)->firstOrFail();
        $alt_kategoriler = Kategori::where('parent_category_id',$kategori->id)->get();
        return view('kategori',compact('kategori','alt_kategoriler'));
    }
}
