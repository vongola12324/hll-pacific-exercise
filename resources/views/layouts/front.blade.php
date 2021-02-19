@extends('layouts.app')

@section('content')
    @yield('console')
@endsection

@push('css')
  <style>
    body{
      background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.7)), url("{{ asset('image/hll-background.jpg') }}");
      background-position: center center;
      background-repeat: no-repeat;
      background-attachment: fixed;
    }
  </style>
@endpush

@push('js')
@endpush
