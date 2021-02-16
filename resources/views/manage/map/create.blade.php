@extends('layouts.manage')

@section('title', 'Create Map')

@section('console')
    <div class="flex flex-wrap">
        <h1 class="text-3xl text-white font-bold my-3">Create Map</h1>
        <div class="min-w-full mb-4">
            <t-button variant="brown" href="{{ route('manage.map.index') }}" style="width: fit-content">Back</t-button>
        </div>
        @include('manage.map.form', ['formUrl' => route('manage.map.store'), 'formMethod' => 'POST', 'map' => null])
    </div>
@overwrite
