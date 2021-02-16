@extends('layouts.manage')

@section('title', 'Battle Detail')

@section('console')
    <div class="flex flex-wrap">
        <h1 class="text-3xl text-white font-bold my-3">Battle #{{ $battle->id }} - {{ $battle->name }}</h1>
        <div class="min-w-full mb-4">
            <t-button variant="brown" href="{{ route('manage.battle.index') }}" style="width: fit-content">Back
            </t-button>
        </div>
        <h2 class="text-2xl text-gray-300 font-bold mt-3">Battle Information</h2>
        <div class="bg-white shadow overflow-hidden sm:rounded-lg w-full">
            <div class="border-t border-gray-200">
                <dl>
                    <div class="bg-gray-50 px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Use Map
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            (#{{ $battle->map->id }}) {{ $battle->map->name }}
                        </dd>
                    </div>
                    <div class="bg-white px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Battle Name
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $battle->name }}
                        </dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Battle Mode
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ \App\Constants\BattleMode::byValue($battle->mode)->getName() }}
                        </dd>
                    </div>
                    <div class="bg-white px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Meeting Time
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $battle->meeting_at->toDateTimeString() }}
                        </dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Match Time
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $battle->match_at->toDateTimeString() }}
                        </dd>
                    </div>
                    <div class="bg-white px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Max People
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $battle->max_people }}
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
        <h2 class="text-2xl text-gray-300 font-bold mt-3">Forces & Division</h2>
        <div class="min-w-full mb-4">
            <div class="grid grid-cols-2 divide-x">
                @foreach($battle->forces as $force)
                    <div class="grid grid-cols-1 divide-y">
                        <div class="text-center pb-3 px-3">
                            <h3 class="text-2xl text-white">{{ $force->name }}</h3>
                            <p class="text-white font-bold">
                                Commander:
                                @if ($force->divisions->where('name', '=', 'Commander')->first()->squads->count() <= 0)
                                    <span class="font-bold text-red-600">N/A</span>
                                @else
                                    <t-tag tag-name="p" variant="badge">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                                        </svg>
                                        {{ $force->divisions->where('name', '=', 'Commander')->first()->squads->first()->name }}
                                    </t-tag>
                                @endif
                            </p>
                        </div>
                        @foreach($force->divisions->where('name', '!=', 'Commander') as $division)
                            <div class="text-center pt-2 pb-6 px-3">
                                <p class="text-white font-bold">{{ $division->name }}</p>
                                @if($division->squads->count() <= 0)
                                    <span class="font-bold text-red-600">N/A</span>
                                @else
                                @foreach($division->squads as $squad)
                                    <t-tag tag-name="p" variant="badge">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                                        </svg>
                                        {{ $squad->name }}
                                    </t-tag>
                                @endforeach
                                @endif
                            </div>
                        @endforeach

                    </div>
                @endforeach
            </div>
        </div>
    </div>
@overwrite
