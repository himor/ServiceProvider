<?php

/**
 * ������ �������������
 */

require_once '/Service/ServiceProvider.php';
require_once '/Entity/Thing.php';
require_once '/Model/ThingModel.php';
require_once '/Repository/ThingRepository.php';
require_once '/Service/RepositoryService.php';
require_once '/Service/ThingService.php';

class Application
{
	use ServiceProvider;

	public static function run()
	{
		$thing = new Thing();
		$this->getModel('thing')->doStuff($thing);
	}
}

Application::run();
