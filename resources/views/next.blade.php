@extends('layouts.front')

@section('title', 'Welcome!')

@section('console')
    <next-page :battle="{{ json_encode($battle) }}"  :links="{{ json_encode($links) }}"></next-page>
@endsection
