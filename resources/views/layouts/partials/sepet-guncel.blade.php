<tr>
    <td><a href="{{ route('urun',$urun->options->href)}}"><img src="http://lorempixel.com/120/100/food/2"> {{ $urun->name }}</a> </td>
    <td>{{ number_format($urun->price , 2 ) }}</td>
    <td>
        <a href="#" urunToken="{{ $key }}" class="btn btn-xs btn-default">-</a>
        <span style="padding: 10px 20px">{{ $urun->qty  }}</span>
        <a id="arttir" href="javascript:void(0)" urunToken="{{ $urun->rowId  }}" class="btn btn-xs btn-default">+</a>
    </td>
    <td>{{ number_format( $urun->price * $urun->qty , 2 )   }}</td>
    <td>
        <a href="#">Sil</a>
    </td>
</tr>
