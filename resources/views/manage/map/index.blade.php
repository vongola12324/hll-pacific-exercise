@extends('layouts.manage')

@section('title', 'Maps')

@section('console')
    <div class="flex flex-wrap">
        <h1 class="text-3xl text-white font-bold my-3">Maps</h1>
        <div class="min-w-full mb-4">
            <t-button href="{{ route('manage.map.create') }}" style="width: fit-content">New</t-button>
        </div>
        @if($maps->count() > 0)
            <x-table :data="$maps" :heading="$keys">
                @scopedslot('action', ($item))
                <t-button href="{{ route('manage.map.edit', [$item['id']]) }}" class="inline-block" style="width: fit-content">Edit</t-button>
                <form action="{{ route('manage.map.destroy', [$item['id']]) }}" method="POST" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <t-button variant="error" type="submit" style="width: fit-content">Delete</t-button>
                </form>
                @endscopedslot
            </x-table>
        @else
            <div class="w-full">
                <t-alert variant="danger" :show="true" :dismissible="false">No Map! Create a new one?</t-alert>
            </div>
        @endif
    </div>
@overwrite
