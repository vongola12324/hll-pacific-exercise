<?php

namespace App\Http\Controllers;

use App\Http\Requests\BattlePostRequest;
use App\Models\Battle;
use App\Models\Map;
use App\Services\BattleService;
use Carbon\Carbon;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class BattleController extends Controller
{
    protected $battleService;

    public function __construct(BattleService $battleService)
    {
        $this->battleService = $battleService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $battles = Battle::orderByDesc('id')->get();
        return view('manage.battle.index')->with(
            [
                'battles' => $battles,
                'keys'    => ['id', 'name', 'action'],
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
        return view('manage.battle.create')->with(
            [
                'maps'  => $this->battleService->getMapForRichSelect(),
                'modes' => $this->battleService->getModeForRadioGroup(),
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BattlePostRequest $request
     * @return RedirectResponse
     */
    public function store(BattlePostRequest $request): RedirectResponse
    {
        $map = Map::whereId($request->get('map_id'))->first();
        $battle = $this->battleService->generate(
            $map,
            $request->only(
                [
                    'name',
                    'mode',
                    'meeting_at',
                    'match_start_after',
                    'max_people',
                ]
            ),
            $request->has('use_template') && $request->boolean('use_template', false)
        );
        return redirect()->route('manage.battle.show', $battle);
    }

    /**
     * Display the specified resource.
     *
     * @param Battle $battle
     * @return Application|Factory|View|Response
     */
    public function show(Battle $battle)
    {
        return view('manage.battle.show')->with(
            [
                'battle' => $battle->load(['map', 'forces.divisions.squads']),
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Battle $battle
     * @return Application|Factory|View|Response
     */
    public function edit(Battle $battle)
    {
        return view('manage.battle.edit')->with(
            [
                'battle' => $battle,
                'maps'   => $this->battleService->getMapForRichSelect(),
                'modes'  => $this->battleService->getModeForRadioGroup(),
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BattlePostRequest $request
     * @param Battle $battle
     * @return RedirectResponse
     */
    public function update(BattlePostRequest $request, Battle $battle): RedirectResponse
    {
        $battle->update(
            [
                'map_id' => $request->get('map_id'),
                'name'=> $request->get('name'),
                'mode'=> $request->get('mode'),
                'meeting_at'=> Carbon::parse($request->get('meeting_at'))->setTimezone(config('app.timezone')),
                'max_people'=> $request->get('max_people'),
                'match_at' => Carbon::parse($request->get('meeting_at'))->setTimezone(config('app.timezone'))->addMinutes($request->get('match_start_after')),
            ]
        );
        return redirect()->route('manage.battle.show', $battle);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Battle $battle
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Battle $battle): RedirectResponse
    {
        $battle->delete();
        return redirect()->route('manage.battle.index');
    }
}
