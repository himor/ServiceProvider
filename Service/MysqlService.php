<?php
/**
 * @author Mike
 */
class MysqlService
{
	use ServiceProvider;

	/**
	 *
	 * CREATE TABLE `data` (`item` VARCHAR(255));
	 *
	 */

	private $c;

	/**
	 * Prepare queue
	 */
	public function __construct()
	{
		$this->c = mysql_connect('localhost', 'root', 'root');

		if (!$this->c)
			throw new Exception('FAILED TO CONNECT TO MYSQL');

		if (!mysql_select_db('duser041_experiment', $this->c))
			throw new Exception('CANNOT SELECT THE DATABASE');
	}

	/**
	 * Insert into queue
	 *
	 * @param Thing $thing
	 * @throws Exception
	 */
	public function put(Thing $thing)
	{
		if (!mysql_query('INSERT INTO data VALUES(\'' . serialize($thing) . '\');', $this->c))
			throw new Exception('CANNOT INSERT');
	}

	/**
	 * Get message from the queue
	 *
	 * @return NULL
	 */
	public function get()
	{
		$r = mysql_query('SELECT * FROM data LIMIT 1;', $this->c);
		if ($r) {
			$data = mysql_fetch_assoc($r);
			mysql_query('DELETE FROM data LIMIT 1;', $this->c);
			return $data['item'];
		} else {
			return null;
		}
	}

}