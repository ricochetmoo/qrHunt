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
}
