<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('/') }}">
                <img src="{{ asset('images/logo.png') }}">
            </a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <form class="navbar-form navbar-left" action="{{ route('ara') }}" method="post">
                {{ csrf_field() }}
                <div class="input-group">
                    <input type="text" id="navbar-search" name="aranan" class="form-control" placeholder="Ara" value="{{old('aranan')}}" minlength="3" required>
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-default">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ route('sepet') }} "><i class="fa fa-shopping-cart"></i> Sepet <span class="badge badge-theme">5</span></a></li>
                <li><a href="{{ route('auth.giris')  }}">Oturum Aç</a></li>
                <li><a href="{{ route('auth.kayit')  }}">Kaydol</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Profil <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('siparisler') }}">Siparişlerim</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Çıkış</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
