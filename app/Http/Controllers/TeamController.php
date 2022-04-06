<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Team;

class TeamController extends Controller
{
	public static function index()
	{
		return Team::all();
	}

	public static function findOne($id)
	{
		return Team::find($id);
	}

	public static function create(Request $request)
	{
		$request->validate
		([
			'name' => ['string', 'required'],
			'start_location_id' => ['integer', 'required'],
		]);

		$team = new Team();

		$team->name = $request->name;
		$team->start_location_id = $request->start_location_id;

		if (($request->start_location_id + 1) % (LocationController::count() + 1) == 0)
		{
			$team->next_location_id = 1;
		}
		else
		{
			$team->next_location_id = ($request->start_location_id + 1) % (LocationController::count() + 1);
		}

		$team->save();

		return redirect('/admin/team');
	}

	public static function choose($teamId)
	{
		session(['team' => $teamId]);

		return redirect('/scanner');
	}
}
