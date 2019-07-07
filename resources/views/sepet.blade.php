@extends('layouts.master')
@section('title','Ürün')
@section('content')
    <div class="container">
        <div class="bg-content">
            <h2>Sepet</h2>
            @if(count(Cart::content())>0)
            <table class="table table-bordererd table-hover">
                <tr>
                    <th>Ürün</th>
                    <th>Adet Fiyatı</th>
                    <th>Adet</th>
                    <th>Ara Toplam</th>
                </tr>
                <!--
                <tr>
                    <td colspan="5">Henüz sepette ürün yok</td>
                </tr>
                -->
                @foreach(Cart::content() as $key => $urun)
                    <tr>
                        <td><a href="{{ route('urun',$urun->options->href)}}"><img src="http://lorempixel.com/120/100/food/2"> {{ $urun->name }}</a> </td>
                        <td>{{ number_format($urun->price , 2 ) }}</td>
                        <td>
                            <a href="#" urunToken="{{ $key }}" class="btn btn-xs btn-default azalt">-</a>
                            <span style="padding: 10px 20px">{{ $urun->qty  }}</span>
                            <a href="javascript:void(0)" urunToken="{{ $urun->rowId  }}" class="btn btn-xs btn-default arttir">+</a>
                        </td>
                        <td>{{ number_format( $urun->price * $urun->qty , 2 )   }}</td>
                        <td>
                            <a class="sil"  urunToken="{{ $urun->rowId  }}" href="#">Sil</a>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <th>Alt Toplam</th>
                    <th>{{ number_format( Cart::subtotal() , 2)  }}</th>
                </tr>
                <tr>
                    <th>KDV ({{ config('cart.tax')}} %)</th>
                    <th>{{ Cart::tax() }}</th>
                </tr>
                <tr>
                    <th>Toplam Tutar (KDV Dahil)</th>
                    <th>{{ number_format( Cart::total() , 2)  }}</th>
                </tr>
            </table>
            @else
                <p>Sepetinizde ürün bulunmamaktadır. Anasayfaya dönmek için <a href="{{ route('/') }}">tıklayınız.</a></p>
            @endif
            <div>
                <a href="javascript:void(0)" class="btn btn-info pull-left bosalt">Sepeti Boşalt</a>
                <a href="{{ route('ode')  }}" class="btn btn-success pull-right btn-lg">Ödeme Yap</a>
            </div>
        </div>
    </div>
@endsection
@section('foot')
    <script>


        $('.arttir').click(function () {
           var urun_id =$(this).attr('urunToken');

            sepet.arttir(urun_id);

        });

        $('.azalt').click(function () {
            var urun_id=$(this).attr('urunToken');

            sepet.azalt(urun_id);

        });


        $('.sil').click(function () {
            var urun_id=$(this).attr('urunToken');

            sepet.urunSil(urun_id);

        });

        $('.bosalt').click(function () {

            sepet.bosalt();

        });



        var sepet = {
            'arttir':function(urunToken){

                $.ajax({
                    'url' : '{{ route('ajax.sepet.arttir')}}',
                    'method' : 'post',
                    'data' :   {'urun_id':urunToken, '_token' : '{{ csrf_token() }}' } ,
                    'success':function(data) {
                        $('body').empty();
                        $('body').html(data);


                    }
                });

            },
            'azalt':function(urunToken){

                $.ajax({
                    'url' : '{{ route('ajax.sepet.azalt')}}',
                    'method' : 'post',
                    'data' :   {'urun_id':urunToken, '_token' : '{{ csrf_token() }}' } ,
                    'success':function(data) {
                        $('body').empty();
                        $('body').html(data);


                    }
                });


            },
            'urunSil':function (urunToken) {

                $.ajax({
                    'url' : '{{ route('ajax.sepet.urun.sil')}}',
                    'method' : 'post',
                    'data' :   {'urun_id':urunToken, '_token' : '{{ csrf_token() }}' } ,
                    'success':function(data) {
                        $('body').empty();
                        $('body').html(data);


                    }
                });

            },
            'bosalt':function () {
                $.ajax({
                    'url' : '{{ route('ajax.sepet.bosalt')}}',
                    'method' : 'post',
                    'data' :   {'_token' : '{{ csrf_token() }}' } ,
                    'success':function(data) {
                        $('body').empty();
                        $('body').html(data);


                    }
                });
            }
        }
    </script>
@endsection
