@extends('layouts.manage')

@section('title', 'Battle')

@section('console')
    <div class="flex flex-wrap">
        <h1 class="text-3xl text-white font-bold my-3">Battles</h1>
        @if($battles->count() > 0)
            <x-table :data="$battles" :heading="$keys">
                @scopedslot('action', ($item))
                <t-button href="{{ route('manage.battle.edit', [$item['id']]) }}" class="inline-block" style="width: fit-content">Edit</t-button>
                <form action="{{ route('manage.battle.destroy', [$item['id']]) }}" method="POST" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <t-button variant="error" type="submit" style="width: fit-content">Delete</t-button>
                </form>
                @endscopedslot
            </x-table>
        @else
            <div class="w-full">
                <t-alert variant="danger" :show="true" :dismissible="false">No Battle! Create a new one?</t-alert>
            </div>
        @endif
    </div>
@overwrite
