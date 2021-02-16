@extends('layouts.manage')

@section('title', 'Edit Map')

@section('console')
    <div class="flex flex-wrap">
        <h1 class="text-3xl text-white font-bold my-3">Edit Map</h1>
        <div class="min-w-full mb-4">
            <t-button variant="brown" href="{{ route('manage.battle.index') }}" style="width: fit-content">Back</t-button>
        </div>
        @include('manage.map.form', ['formUrl' => route('manage.map.update', $map), 'formMethod' => 'PATCH', 'map' => $map])
    </div>
@overwrite
