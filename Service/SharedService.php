<?php
/**
 * @author Mike
 */
class SharedService
{
	use ServiceProvider;

	const QUEUE_ID = 14000;
	private $queue;

	/**
	 * Prepare queue
	 */
	public function __construct()
	{
		$this->queue = msg_get_queue(self::QUEUE_ID);
	}

	/**
	 * Insert into queue
	 *
	 * @param Thing $thing
	 * @throws Exception
	 */
	public function put(Thing $thing)
	{
		if (!msg_send($this->queue, 1, $thing))
			throw new Exception('FAILED TO INSERT INTO QUEUE');
		else
			return msg_stat_queue($this->queue);
	}

	/**
	 * Get message from the queue
	 *
	 * @return NULL
	 */
	public function get()
	{
		$msg = null;

		if (msg_receive($this->queue, 1, null, 512, $msg)) {
			return $msg;
		} else {
			return null;
		}
	}

}