@extends('layouts.master')
@section('title','Anasayfa')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">Kategoriler</div>
                    <div class="list-group categories">
                        @foreach($kategoriler as $kategori)
                        <a href=" {{ route('kategori', $kategori->slug) }} " class="list-group-item"><i class="fa fa-television"></i> {{ $kategori->name }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @for($i=0; $i<count($slider) ; $i++)
                        <li data-target="#carousel-example-generic" data-slide-to="{{ $i }}" class=" {{ $i == 0 ? 'active':'' }} "></li>
                        @endfor
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        @foreach($slider as $index => $slide)
                        <div class="item {{ $index == 0 ? 'active':'' }}">
                            <img src="http://lorempixel.com/640/400/food/1" alt="...">
                            <div class="carousel-caption">
                                {{ $slide-> urun-> name }}
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-default" id="sidebar-product">
                    <div class="panel-heading">Günün Fırsatı</div>
                    <div class="panel-body">
                        <a href="{{ route('urun',  $gunun_firsati -> slug)  }}">
                            <img src="https://via.placeholder.com/400x400?text=GununFirsati" class="img-responsive">
                            <p class="text-center">  {{ $gunun_firsati->name }} </p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="products">
            <div class="panel panel-theme">
                <div class="panel-heading">Öne Çıkan Ürünler</div>
                <div class="panel-body">
                    <div class="row">
                        @foreach($one_cikan_urunler as $one_cikan)
                        <div class="col-md-3 product">
                            <a href="{{ route('urun', $one_cikan-> urun-> slug) }}"><img src="https://via.placeholder.com/400x400?text=OneCikan"></a>
                            <p><a href="{{ route('urun', $one_cikan-> urun-> slug) }}">{{  $one_cikan-> urun -> name }}</a></p>
                            <p class="price">{{  $one_cikan -> urun -> fiyat }} ₺</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="products">
            <div class="panel panel-theme">
                <div class="panel-heading">Çok Satan Ürünler</div>
                <div class="panel-body">
                    <div class="row">
                        @foreach($cok_satan_urunler as $cok_satan)
                        <div class="col-md-3 product">
                            <a href="{{ route('urun', $cok_satan -> urun ->slug) }}"><img src="https://via.placeholder.com/400x400?text=CokSatan"></a>
                            <p><a href="{{ route('urun', $cok_satan -> urun ->slug) }}">{{ $cok_satan -> urun ->  name  }}</a></p>
                            <p class="price">{{ $cok_satan -> urun -> fiyat  }} ₺</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="products">
            <div class="panel panel-theme">
                <div class="panel-heading">İndirimli Ürünler</div>
                <div class="panel-body">
                    <div class="row">
                        @foreach($indirimli_urunler as $indirimli)
                        <div class="col-md-3 product">
                            <a href="{{ route('urun', $indirimli -> urun ->slug) }}"><img src="https://via.placeholder.com/400x400?text=İndirimli"></a>
                            <p><a href="{{ route('urun', $indirimli-> urun ->slug) }}">{{ $indirimli -> urun -> name  }}</a></p>
                            <p class="price">{{ $indirimli -> urun -> fiyat  }} ₺</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
