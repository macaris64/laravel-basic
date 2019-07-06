<?php

Route::get('/' , 'AnasayfaController@index')->name('/');
Route::get('/index' , 'AnasayfaController@index')->name('anasayfa');
Route::post('/ara','UrunController@ara')->name('ara');
Route::get('/ara','UrunController@ara')->name('ara');

Route::get('/kategori/{slug_kategoriadi}' , 'KategoriController@index')->name('kategori');

Route::get('/urun/{slug_urunadi}' , 'UrunController@index')->name('urun');

Route::get('/sepet' , 'SepetController@index')->name('sepet');
Route::get('/ode' , 'OdeController@index')->name('ode');
Route::get('/siparisler' , 'SiparisController@index')->name('siparisler');
Route::get('/siparisler/{id}' , 'SiparisController@detay')->name('siparis');
// Auth Prefix
Route::get('/giris' , 'KullaniciController@giris_form')->name('auth.giris');
Route::get('/kayit-ol' , 'KullaniciController@kayit_form')->name('auth.kayit');
Route::post('/kayit-ol' , 'KullaniciController@kayit');
Route::get('/sifre-sifirlama-email' , 'KullaniciController@sifre_sifirla_email_form')->name('auth.sifresifirlaemail');
Route::get('/sifre-sifirlama-formu' , 'KullaniciController@sifre_sifirla_form')->name('auth.sifresifirlaform');
//Mail
Route::get('/test/mail',function (){
    $kullanici = \App\Models\Kullanici::get()->first();
    return new App\Mail\KullaniciKayitMail($kullanici);
});
