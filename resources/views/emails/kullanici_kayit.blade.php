    <div class="container">
        <div class="row jumbotron">
            <div class="col-lg-12">
                <h1>{{ config('app.name')  }}</h1>
                <p>{{ $kullanici->name  }} Kaydınız başarı ile alınmıştır.</p>
                <p>Kaydınızı aktifleştirmek için <a href="{{config('app.url')}}/kullanici/aktiflestir/{{$kullanici->aktivasyon_anahtari}}">şu </a>bağlantıya tıklayabilirsiniz veya aşağıdaki bağlantıyı tarayıcınızda açabilirsiniz.</p>
                <p>{{config('app.url')}}/kullanici/aktiflestir/{{$kullanici->aktivasyon_anahtari}}</p>
            </div>
        </div>
    </div>

