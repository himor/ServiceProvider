<?php

/**
 * Пример использования
 */

require_once '/Service/ServiceProvider.php';
require_once '/Entity/Thing.php';
require_once '/Model/ThingModel.php';
require_once '/Repository/ThingRepository.php';
require_once '/Service/RepositoryService.php';
require_once '/Service/ThingService.php';

class Application
{
	public static function run()
	{
		$thing = new Thing();
		ThingModel::_()->doStuff($thing);
	}
}

Application::run();
