@extends('layouts.front')

@section('title', 'Welcome!')

@section('console')
    <welcome-page :links="{{ json_encode($links) }}"></welcome-page>
@endsection
