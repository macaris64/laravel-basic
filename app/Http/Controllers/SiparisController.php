<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiparisController extends Controller
{
    public function siparisler() {
        return view('siparisler');
    }
    public function siparis() {
        return view('siparis');
    }
}
