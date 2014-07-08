<?php
/**
 * This is an example of a service which does some routine
 *
 * @author Mike
 */
class ThingService
{
	use ServiceProvider;

	private $counter = 0;

	/**
	 * This is a routine
	 *
	 * @param Thing $thing
	 */
	public function register(Thing $thing)
	{
		echo "Registered " . (++$this->counter) . " things<br>";
	}

}