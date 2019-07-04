@extends('layouts.master')
@section('title','Bir şeyler ters gitti.')
@section('content')
    <div class="container">
        <div class="row jumbotron text-center">
            <div class="col-lg-12">
                <h1>404</h1>
                <h2>Böyle bir sayfa bulunamadı.</h2>
                <a href="{{ route('/')  }}" class="btn btn-primary">Anasayfaya Dön</a>
            </div>
        </div>
    </div>
@endsection
