<?php

Route::get('/' , 'AnasayfaController@index')->name('anasayfa');
Route::get('/index' , 'AnasayfaController@index')->name('anasayfa');


Route::get('/kategori/{slug_kategoriadi}' , 'KategoriController@index')->name('kategori');

Route::get('/urun/{slug_urunadi}' , 'UrunController@index')->name('urun');

Route::get('/sepet' , 'SepetController@index')->name('sepet');
Route::get('/ode' , 'OdeController@index')->name('ode');
Route::get('/siparisler' , 'SiparisController@siparisler')->name('siparisler');
Route::get('/siparis' , 'SiparisController@siparis')->name('siparis');
Route::get('/giris' , 'KullaniciController@giris')->name('giris');
Route::get('/kayit-ol' , 'KullaniciController@kayit')->name('kayit');

