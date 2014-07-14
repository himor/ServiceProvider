<?php

require_once __DIR__.'/Service/ServiceProvider.php';
require_once __DIR__.'/Entity/Thing.php';
require_once __DIR__.'/Model/ThingModel.php';
require_once __DIR__.'/Repository/ThingRepository.php';
require_once __DIR__.'/Service/RepositoryService.php';
require_once __DIR__.'/Service/SharedService.php';
require_once __DIR__.'/Service/MysqlService.php';

class Application
{
	use ServiceProvider;
	const ITERATIONS = 100000;
	const EACH = 5000;
	private $use;

	public function __construct($service)
	{
		$this->use = $service;
	}

	public function run()
	{
		$i = 0;
		echo "\nPushing " . self::ITERATIONS . " records to {$this->use}\n";
		while (++$i <= self::ITERATIONS) {

			$thing = new Thing($i);
			$this->get($this->use)->put($thing);

			if ($i % self::EACH == 0) {
				echo "{$i}\n";
			}

		}

	}

	public function run2()
	{
		$i = 0;
		echo "\nPulling " . self::ITERATIONS . " records from {$this->use}\n";
		while ($i < self::ITERATIONS) {

			$data = $this->get($this->use)->get();

			if ($data)
				$i++;

			if ($i % self::EACH == 0) {
				echo "{$i}\n";
			}

		}

	}
}

$start = microtime(true);
$app = new Application('shared');
$app->run2();
echo "\nTotal time: " . (microtime(true) - $start);
