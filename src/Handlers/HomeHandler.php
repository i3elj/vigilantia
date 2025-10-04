<?php declare(strict_types=1);

namespace Handlers;

use Agmen\Request;

use function Agmen\view;

class HomeHandler
{
	public static function get(Request $req): void
	{
		view("home");
	}
}
