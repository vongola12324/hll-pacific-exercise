@extends('layouts.app')

@section('content')
  <div class="wrapper">
    @yield('console')
  </div>    
  <div id="footer"  class="w-screen text-white text-center">
    Powered by Vongola, AoMaple
  </div>
@endsection

@push('css')
  <style>
    html{
      height: 100%; 
    }
    #app{
      height: 100%;
    }
    body{
      background-image: linear-gradient(rgba(0,0,0,0.9),rgba(0,0,0,0.7)), url("{{ asset('image/hll-background.jpg') }}");
      background-position: center center;
      background-repeat: no-repeat;
      background-attachment: fixed;
      display: flex; /*使物件依序排列*/
      flex-direction: column; /*使物件垂直排列*/
      height: 100%;
    }
    .wrapper {
      flex-grow: 1; /*可佔滿垂直剩餘的空間*/
    }
    .footer {
      background-color: gray;
    }
  </style>
@endpush

@push('js')
@endpush
