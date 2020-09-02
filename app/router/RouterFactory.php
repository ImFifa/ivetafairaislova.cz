<?php declare(strict_types = 1);

namespace App;

use Nette;
use Nette\Application\Routers\RouteList;
use Nette\Application\Routers\Route;

class RouterFactory
{

	use Nette\StaticClass;

	public static function createRouter(): Nette\Routing\Router
	{
		$router = new RouteList;

		/* AdminModule */
		$router[] = $backend = new RouteList('Admin');
		$backend[] = new Route('admin/<presenter>/<action>[/<id>]', 'Homepage:default');

		/* ProjectModule */
		$router[] = $project = new RouteList('Project');

		// Basic Routes
        $project[] = new Route('[<lang=cs [a-z]{2}>/]', 'Homepage:default');
        $project[] = new Route('[<lang=cs [a-z]{2}>/]galerie[/<year='. date('Y'). '>]', 'Homepage:gallery');
        $project[] = new Route('[<lang=cs [a-z]{2}>/]vysledky[/<year='. date('Y'). '>]', 'Homepage:results');
        $project[] = new Route('[<lang=cs [a-z]{2}>/]novinky', 'New:default');
        $project[] = new Route('[<lang=cs [a-z]{2}>/]novinka/<slug>', 'New:show');
        $project[] = new Route('[<lang=cs [a-z]{2}>/]kalendar', 'Event:default');

        $project[] = new Route('[<lang=cs [a-z]{2}>/]<presenter>/<action>', 'Error:404');

		return $router;
	}

}
