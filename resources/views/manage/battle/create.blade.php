@extends('layouts.manage')

@section('title', 'Create Battle')

@section('console')
    <div class="flex flex-wrap">
        <h1 class="text-3xl text-white font-bold my-3">Create Battle</h1>
        <div class="min-w-full mb-4">
            <t-button variant="brown" href="{{ route('manage.battle.index') }}" style="width: fit-content">Back</t-button>
        </div>
        @include('manage.battle.form', ['formUrl' => route('manage.battle.store'), 'formMethod' => 'POST', 'battle' => null, 'maps' => $maps])
    </div>
@overwrite
