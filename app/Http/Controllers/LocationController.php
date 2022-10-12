<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Location;

class LocationController extends Controller
{
	public static function index()
	{
		return Location::all();
	}

	public static function count()
	{
		return Location::all()->count();
	}

	public static function create(Request $request)
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

	public static function scan(Request $request, $code)
	{
		if ($code == "93247")
		{
			$team = TeamController::findOne($request->session()->get('team'));
			$team->joes_car = true;
			$team->save();

			return redirect()->back()->withErrors(['msg' => 'Congrats on finding Joe\'s car!']);
		}
		
		if (!$location = Location::where('code', $code)->first())
		{
			return redirect()->back()->withErrors(['msg' => 'This location does not exist']);
		}

		$team = TeamController::findOne($request->session()->get('team'));

		$location->visits()->attach([$team->id]);

		if ($location == $team->next)
		{
			if (($location->id + 1) % (LocationController::count() + 1) == 0)
			{
				$team->next_location_id = 1;
			}
			else
			{
				$team->next_location_id = ($location->id + 1) % (LocationController::count() + 1);
			}

			$team->save();

			if($team->next_location_id == $team->start->id)
			{
				return redirect()->back()->withErrors(['msg' => 'You\'re finished! Please return to the start.']);
			}
			else
			{
				return redirect()->back()->withErrors(['msg' => 'Nice work, time to find your next one!']);
			}
		}
		else
		{
			return redirect()->back()->withErrors(['msg' => 'That was not your next QR code!']);
		}
	}
}
