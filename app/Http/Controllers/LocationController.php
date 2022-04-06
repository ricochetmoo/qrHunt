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
		$location = Location::find($code);
	}
}
