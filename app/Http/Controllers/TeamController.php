<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Team;

class TeamController extends Controller
{
	public function index()
	{
		return Team::all();
	}

	public function create(Request $request)
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
}
