<?php

namespace App\Http\Controllers;

use App\Http\Requests\MapPostRequest;
use App\Models\Map;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class MapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $maps = Map::all();
        return view()->with(
            [
                'maps' => $maps,
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        return view();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param MapPostRequest $request
     * @return RedirectResponse
     */
    public function store(MapPostRequest $request)
    {
        Map::create($request->only(['name']));
        return redirect()->route('map.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Map $map
     * @return Application|Factory|View|Response
     */
    public function show(Map $map)
    {
        return view()->with(
            [
                'map' => $map,
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Map $map
     * @return Application|Factory|View|Response
     */
    public function edit(Map $map)
    {
        return view()->with(
            [
                'map' => $map,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param MapPostRequest $request
     * @param Map $map
     * @return RedirectResponse
     */
    public function update(MapPostRequest $request, Map $map)
    {
        $map->update($request->only(['name']));
        return redirect()->route('map.show', [$map]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Map $map
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Map $map)
    {
        $map->delete();
        return redirect()->route('map.index');
    }
}
