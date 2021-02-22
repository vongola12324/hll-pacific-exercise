@extends('layouts.front')

@section('title', 'Battle History')

@section('console')
    <history-page :battles="{{ json_encode($battles) }}" :links="{{ json_encode($links) }}"></history-page>
@endsection
