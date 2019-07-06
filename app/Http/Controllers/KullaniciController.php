<?php

namespace App\Http\Controllers;

use App\Mail\KullaniciKayitMail;
use App\Models\Kullanici;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;


class KullaniciController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('cikis');
    }

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

    public function kayit()
    {
        $this->validate(request(), [
            'adsoyad' => 'required|min:5|max:60',
            'email' => 'required|email|unique:kullanici',
            'sifre' => 'required|confirmed|min:5|max:15'
        ]);

        $kullanici = Kullanici::create([
            'adsoyad'                     => request('adsoyad'),
            'email'                       => request('email'),
            'sifre'                       => Hash::make(request('sifre')),
            'aktivasyon_anahtari'         => Str::random(60),
            'aktif_mi'                    => 0

        ]);

        Mail::to(request('email'))->send(new KullaniciKayitMail($kullanici));

        auth()->login($kullanici);
        return redirect()->route('anasayfa');
    }

    public function aktiflestir($anahtar)
    {
        $kullanici = Kullanici::where('aktivasyon_anahtari', $anahtar) -> first();
        if(!is_null($kullanici))
        {
            $kullanici -> aktivasyon_anahtari = null;
            $kullanici -> aktif_mi = 1;
            $kullanici -> save();
            if(!auth()->check())
            {
                auth()->login($kullanici);
            }
            return redirect()->to('/')
                ->with('mesaj','Kullanıcı kaydınız aktifleştirildi')
                ->with('mesaj_tur','success');
        }
        else
        {
            return redirect()->to('/')
                ->with('mesaj','Kullanıcı kaydınız aktifleştirilemedi.')
                ->with('mesaj_tur','warning');
        }
    }

    public function giris()
    {
        $this->validate(request(),[
            'email' => 'required|email',
            'sifre'  => 'required'
        ]);

        if(auth()->attempt(['email' => request('email'), 'password' => request('sifre')], request()->has('benihatirla')))
        {
            request()->session()->regenerate();
            return redirect()->intended('/');
        }
        else
        {
            $errors = ['email' => 'Hatalı Giriş'];
            return back()->withErrors($errors);
        }
    }

    public function cikis()
    {
        auth()->logout();
        request()->session()->flush();
        request()->session()->regenerate();
        return redirect()->route('/');
    }
}
