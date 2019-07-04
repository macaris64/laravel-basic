@extends('layouts.master')
@section('title','Arama Sonuçları')
@section('content')
    <style>
        p,h4 {
            width: 250px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="{{route('/')}}">Anasayfa</a></li>
            <li class="active">Arama Sonucu</li>
        </ol>
        <div class="row">
            <h1>{{ old('aranan')  }} ile ilgili {{ $urunCount  }} ürün bulundu.</h1>
        </div>
    </div>
    <hr>
    @if( count($urunler) )
    <div class="container">
        <div class="products">
            <div class="panel panel-theme">
                <div class="panel-body">
                    <div class="row">
                        @foreach($urunler as $urun)
                        <div class="col-md-3 product">
                            <a href="{{ route('urun',$urun->slug) }}"><img src="https://via.placeholder.com/400x400?text=Aranan" alt=""></a>
                            <h4 class="text-center"><a href="{{ route('urun',$urun->slug) }}">{{ $urun->name  }}</a></h4>
                            <p class="text-center price">{{ $urun->fiyat  }} ₺</p>
                        </div>
                        @endforeach
                    </div>
                    {{ $urunler->links() }}
                </div>
            </div>
        </div>
    </div>
    @endif
@endsection
