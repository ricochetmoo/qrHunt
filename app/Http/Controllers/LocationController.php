<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Location;

class LocationController extends Controller
{
	public function index()
	{
		return Location::all();
	}

	public function count()
	{
		return Location::all()->count();
	}

	public function create(Request $request)
	{
		$request->validate
		([
			'name' => ['string', 'required'],
			'code' => ['string', 'required'],
			'hint' => ['string', 'required'],
		]);
		
		Location::create($request->all());

		return redirect('/admin/location');
	}

	public function scan($code)
	{
		$location = Location::where('code', $code);
		$team = TeamController::findOne(session('team'));

		$location->visits()->attach($team);

		if ($location == $team->next)
		{
			if (($location->id + 1) % (LocationController::count() + 1) == 0)
			{
				$team->next = 1;
			}
			else
			{
				$team->next = ($location->id + 1) % (LocationController::count() + 1);
			}

			if($team->next == $team->start)
			{
				die('finished');
			}
			else
			{
				die('next ' . $team->next->id);
			}
		}
		else
		{
			die('not valid');
		}
	}
}
