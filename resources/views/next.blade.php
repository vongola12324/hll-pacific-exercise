@extends('layouts.front')

@section('title', 'Join Battle')

@section('console')
    <next-page :battle="{{ json_encode($battle) }}"  :links="{{ json_encode($links) }}" :modes="{{ json_encode($modes) }}"></next-page>
@endsection
