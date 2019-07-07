<?php

Route::get('/' , 'AnasayfaController@index')->name('/');
Route::get('/index' , 'AnasayfaController@index')->name('anasayfa');
Route::post('/ara','UrunController@ara')->name('ara');
Route::get('/ara','UrunController@ara')->name('ara');

Route::get('/kategori/{slug_kategoriadi}' , 'KategoriController@index')->name('kategori');

Route::get('/urun/{slug_urunadi}' , 'UrunController@index')->name('urun');

Route::get('/sepet' , 'SepetController@index')->name('sepet');
Route::post('/sepet/ekle' , 'SepetController@ekle')->name('sepet.ekle');
Route::post('/sepet/arttir' , 'SepetController@ajaxQtyArttir')->name('ajax.sepet.arttir');
Route::post('/sepet/azalt' , 'SepetController@ajaxQtyAzalt')->name('ajax.sepet.azalt');
Route::post('/sepet/urun/sil' , 'SepetController@ajaxSepetUrunSil')->name('ajax.sepet.urun.sil');



Route::group(['middleware' => 'auth'], function() {
    Route::get('/ode' , 'OdeController@index')->name('ode');
    Route::get('/siparisler' , 'SiparisController@index')->name('siparisler');
    Route::get('/siparisler/{id}' , 'SiparisController@detay')->name('siparis');
});

// Auth Prefix
Route::get('/giris' , 'KullaniciController@giris_form')->name('auth.giris');
Route::post('/giris' , 'KullaniciController@giris');
Route::get('/kayit-ol' , 'KullaniciController@kayit_form')->name('auth.kayit');
Route::post('/kayit-ol' , 'KullaniciController@kayit');
Route::get('/sifre-sifirlama-email' , 'KullaniciController@sifre_sifirla_email_form')->name('auth.sifresifirlaemail');
Route::get('/sifre-sifirlama-formu' , 'KullaniciController@sifre_sifirla_form')->name('auth.sifresifirlaform');
Route::get('/kullanici/aktiflestir/{anahtar}' , 'KullaniciController@aktiflestir')->name('aktiflestir');
Route::post('/','KullaniciController@cikis') -> name('auth.cikis');
//Mail
Route::get('/test/mail',function (){
    $kullanici = \App\Models\Kullanici::get()->first();
    return new App\Mail\KullaniciKayitMail($kullanici);
});
