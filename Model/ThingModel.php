<?php
/**
 * This is an example of a model
 *
 * @author Mike
 */
class ThingModel
{
	use ServiceProvider;

	private static $instance = null;

	/**
	 * Thing Model is a singleton
	 *
	 * @return ThingModel
	 */
	public static function _()
	{
		if (!self::$instance)
			self::$instance = new self();

		return self::$instance;
	}

	/**
	 * Function which calls `Save` method from the repository
	 * @param Thing $thing
	 */
	public function doStuff(Thing $thing)
	{
		/**
		 * Access Thing Repository
		 */
		$this->get('repository')->get('thing')->save($thing);

		/**
		 * Another way to do it
		 */
		$this->getRepository('thing')->save($thing);

		/**
		 * One more way of doing it
		 */
		$this->getRepository()->save($thing);
	}





}