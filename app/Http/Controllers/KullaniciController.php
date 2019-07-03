<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KullaniciController extends Controller
{
    public function giris_form()
    {
        return view('auth.giris');
    }
    public function kayit_form()
    {
        return view('auth.kayit');

    }
    public function sifre_sifirla_email_form()
    {
        return view('auth.sifresifirlaemail');
    }
    public function sifre_sifirla_form()
    {
        return view('auth.sifresifirlaform');
    }
}
