<?php

/**
 * Пример использования
 */

require_once '/Service/ServiceProvider.php';
require_once '/Entity/Thing.php';
require_once '/Model/ThingModel.php';
require_once '/Repository/ThingRepository.php';
require_once '/Service/RepositoryService.php';
require_once '/Service/SharedService.php';
require_once '/Service/MysqlService.php';

class Application
{
	use ServiceProvider;
	const ITERATIONS = 10000;
	private $use;

	public function __construct($service)
	{
		$this->use = $service;
	}

	public function run()
	{
		$i = 0;
		echo "\nPushing " . self::ITERATIONS . " records to MYSQL\n";
		while (++$i <= self::ITERATIONS) {

			$thing = new Thing($i);
			$this->get($this->use)->put($thing);

			if ($i % 1000 == 0) {
				echo "{$i}\n";
			}

		}

	}

	public function run2()
	{
		$i = 0;
		echo "\nPulling " . self::ITERATIONS . " records from MYSQL\n";
		while ($i < self::ITERATIONS) {

			$data = $this->get($this->use)->get();

			if ($data)
				$i++;

			if ($i % 1000 == 0) {
				echo "{$i}\n";
			}

		}

	}
}

$start = microtime(true);
$app = new Application('mysql');
$app->run();
echo "\nTotal time: " . (microtime(true) - $start);
