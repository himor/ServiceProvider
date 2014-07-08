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

	public function getId()
	{
		return $this->id;
	}
}