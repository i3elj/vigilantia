<?php declare(strict_types=1);

namespace Handlers;

use Resources\Crimes\Crimes;

class CrimesApiHandler
{
	public static function get()
	{
		$crimes = Crimes::all();
		echo json_encode($crimes);
	}
}
