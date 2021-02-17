@extends('layouts.front')

@section('title', 'Welcome!')

@section('console')
    <history-page :battles="{{ json_encode($battles) }}" :links="{{ json_encode($links) }}"></history-page>
@endsection
