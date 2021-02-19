<?php

namespace App\Http\Controllers;

use App\Models\Battle;
use App\Models\Division;
use App\Models\Squad;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Validator;
use App\Constants\BattleMode;

class FrontpageController extends Controller
{
    /**
     * Index Page
     * @return Application|Factory|View
     */
    public function welcome()
    {
        return view('welcome')->with(
            [
                'links' => [
                    'next'    => route('next'),
                    'history' => route('history'),
                ],
            ]
        );
    }

    /**
     * Last battle page
     * Squad leader can join last battle in this page
     * @return Application|Factory|View
     */
    public function next()
    {
        $battle = Battle::latest()->first();
        return view('next')->with(
            [
                'battle' => $battle->load(['forces.divisions.squads','map']),
                'links'  => [
                    'index'   => route('index'),
                    'history' => route('history'),
                    'joinApi' => route('api.join'),
                ],
                'modes' => BattleMode::getConstants(),
            ]
        );
    }

    /**
     * Battle History
     * @return Application|Factory|View
     */
    public function history()
    {
        $battles = Battle::paginate(10);
        return view('history')->with(
            [
                'battles' => $battles,
                'links'   => [
                    'index' => route('index'),
                    'next'  => route('next'),
                ],
            ]
        );
    }

    /**
     * [API] Squad join into division
     * @param Request $request
     * @return JsonResponse
     */
    public function join(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'division_id' => ['required', 'integer', 'exists:divisions,id'],
                'name'        => ['required', 'string'],
                'amount'      => ['required', 'integer', 'min:1'],
                'steam_id'    => ['required', 'string'],
            ]
        );
        if ($validator->fails()) {
            return response()->json(['msg' => 'Invalid input!', 'result' => []], 400);
        }
        // Check battle is valid
        $division = Division::whereId($request->get('division_id'))->first();
        $force = $division->force;
        $battle = $force->battle;
        if ($battle->match_at < now()) {
            return response()->json(['msg' => 'You can not add into this battle!', 'result' => []], 400);
        }
        // Check there is still having space
        $amount = $request->get('amount');
        if ($division->limit_squad !== -1 && $division->squads_count >= $division->limit_squad) {
            return response()->json(['msg' => 'To many squads in this division!', 'result' => []], 400);
        }
        if ($division->limit_squad_player !== -1 && $amount > $division->limit_squad_player) {
            return response()->json(['msg' => 'To many people in the squad in this division!', 'result' => []], 400);
        }
        if ($division->limit_total_player !== -1 && $amount + $division->squads->sum('amount') > $division->limit_total_player) {
            return response()->json(['msg' => 'To many people in this division!', 'result' => []], 400);
        }
        if ($amount + $force->divisions->sum(
                function ($target) {
                    /** @var Division $target */
                    return $target->squads->sum('amount');
                }
            ) > $force->max_people) {
            return response()->json(['msg' => 'To many people in this force!', 'result' => []], 400);
        }
        // Create Squad
        $squad = Squad::create($request->only(['division_id', 'name', 'amount', 'steam_id',]));

        return response()->json(['msg' => 'Ok.', 'result' => $squad], 200);
    }
}
