<?php
/**
 * This is an example of a simple entity
 *
 * @author Mike
 */
class Thing
{
	use ServiceProvider;

	private $id;
	private $code;
	private $timestamp;

	public function __construct($id)
	{
		$this->id 		 = $id;
		$this->timestamp = microtime(true);
		$this->code      = time() . '|' . $this->timestamp . '|' . md5(microtime());
	}

}