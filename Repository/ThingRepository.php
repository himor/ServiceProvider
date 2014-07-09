<?php
/**
 * This is an example of a repository
 *
 * @author Mike
 */
class ThingRepository
{
	use ServiceProvider;

	/**
	 * Function to save thing to a database
	 * it can call services!
	 *
	 * @param Thing $thing
	 */
	public function save(Thing $thing)
	{
		/**
		 * Call Thing Service
		 */
		$this->get('thing')->register($thing);

		/**
		 * Create new object
		 */
		$newThing = new Thing();

		/**
		 * Call Thing Service again
		 */
		$this->get('thing')->register($newThing);

		/**
		 * Perhaps do some SQL because this is why it's called a repository, right?
		 */
		$this->doSomeSql();

		echo 'Saved a thing!<br>';
	}

	/**
	 * Dummy function - please ignore
	 */
	private function doSomeSql()
	{
		$sql = "DELETE * FROM User;";
	}

}
