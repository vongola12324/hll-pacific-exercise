@extends('layouts.manage')

@section('title', 'Edit Battle')

@section('console')
    <div class="flex flex-wrap">
        <h1 class="text-3xl text-white font-bold my-3">Edit Battle</h1>
        <div class="min-w-full mb-4">
            <t-button variant="brown" href="{{ route('manage.battle.index') }}" style="width: fit-content">Back</t-button>
        </div>
        @include('manage.battle.form', ['formUrl' => route('manage.battle.update', $battle), 'formMethod' => 'PATCH', 'battle' => $battle, 'maps' => $maps])    </div>
@overwrite
