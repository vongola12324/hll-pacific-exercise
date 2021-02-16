@extends('layouts.manage')

@section('title', 'Users')

@section('console')
    <div class="flex flex-wrap">
        <h1 class="text-3xl text-white font-bold my-3">Users</h1>
        @if($users->count() > 0)
            <x-table :data="$users" :heading="$keys">
                @scopedslot('action', ($item))
                <form action="{{ route('manage.user.destroy', [$item['id']]) }}" method="POST" class="inline-block">
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
