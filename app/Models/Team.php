<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
	use HasFactory;

	protected $fillable =
	[
		'name',
		'start_location_id',
		'next_location_id'
	];

	public function scans()
	{
		return $this->belongsToMany(Location::class);
	}

	public function start()
	{
		return $this->belongsTo(Location::class, 'start_location_id', 'id');
	}

	public function next()
	{
		return $this->belongsTo(Location::class, 'next_location_id', 'id');
	}
}
