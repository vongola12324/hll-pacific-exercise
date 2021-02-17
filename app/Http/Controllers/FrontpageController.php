<?php

namespace App\Http\Controllers;

use App\Models\Battle;
use App\Models\Division;
use App\Models\Squad;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Validator;

class FrontpageController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }

    public function next()
    {
        $battle = Battle::latest();
        return view('next')->with(['battle' => $battle, 'join_api' => route('api.join')]);
    }

    public function history()
    {
        $battles = Battle::paginate(10);
        return view('history')->with(['battles' => $battles]);
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
        if ($division->squads_count >= $division->limit_squad) {
            return response()->json(['msg' => 'To many squads in this division!', 'result' => []], 400);
        }
        if ($amount > $division->limit_squad_player) {
            return response()->json(['msg' => 'To many people in the squad in this division!', 'result' => []], 400);
        }
        if ($amount + $division->squads->sum('amount') > $division->limit_total_player) {
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
