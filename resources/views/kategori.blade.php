@extends('layouts.master')
@section('title', $kategori->name)
@section('content')
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="{{ route('/')  }}">Anasayfa</a></li>
            <li class="active">{{ $kategori -> name  }}</li>
        </ol>
        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $kategori -> name  }}</div>
                    <div class="panel-body">
                        @if(count($alt_kategoriler) > 0 )
                        <h3>Alt Kategoriler</h3>
                        <div class="list-group categories">
                            @foreach($alt_kategoriler as $kategori)
                            <a href="{{ $kategori->slug  }}" class="list-group-item"><i class="fa fa-television"></i> {{ $kategori->name  }}</a>
                            @endforeach
                        </div>
                        <h3>Fiyat Aralığı</h3>
                        <form>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"> 100-200
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"> 200-300
                                    </label>
                                </div>
                            </div>
                        </form>
                        @else
                            <p>Bu kategoride alt kategori bulunmamaktadır.</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="products bg-content">
                    @if(count($urunler) > 0 )
                    Sırala
                    <a href="#" class="btn btn-default">Çok Satanlar</a>
                    <a href="#" class="btn btn-default">Yeni Ürünler</a>
                    <hr>
                    @endif
                    <div class="row">
                        @if(count($urunler) == 0 )
                            <p class="col-lg-12">Bu kategoride henüz ürün bulunmamaktadır.</p>
                        @endif
                        @foreach($urunler as $urun)
                        <div class="col-md-3 product">
                            <a href="{{ route('urun' , $urun->slug) }}"><img src="http://lorempixel.com/400x400?text=UrunResmi"></a>
                            <p><a href="{{ route('urun' , $urun->slug) }}">{{ $urun->name  }}</a></p>
                            <p class="price">{{ $urun->fiyat  }} ₺</p>
                            <p><a href="#" class="btn btn-theme">Sepete Ekle</a></p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
@endsection
