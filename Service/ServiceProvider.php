<?php
/**
 * This is a cool trait example - main piece which provides services
 *
 * @author Mike
 */
trait ServiceProvider
{
	private $services = array();

	/**
	 * Returns a Service by name
	 *
	 * @param unknown $name
	 * @throws Exception
	 * @return multitype:
	 */
	public function get($name)
	{
		if (!$name)
			throw new Exception("Service name is requuired.");

		$serviceName = ucfirst($name) . 'Service';

		if (!array_key_exists($serviceName, $this->services))
			if (class_exists($serviceName))
				$this->services[$serviceName] = new $serviceName();
			else
				throw new Exception("Service {$serviceName} does not exist.");

		return $this->services[$serviceName];
	}

	/**
	 * Returns a repository by name
	 * or for current class if name is not specified
	 *
	 * @param string $name
	 */
	public function getRepository($name = null)
	{
		if (!$name) {
			$name = __CLASS__;
			if (strpos($name, 'Model') !== false)
				$name = substr($name, 0, strpos($name, 'Model'));
			if (strpos($name, 'Repository') !== false)
				$name = substr($name, 0, strpos($name, 'Repository'));
			if (strpos($name, 'Service') !== false)
				$name = substr($name, 0, strpos($name, 'Service'));
		}

		return $this->get('repository')->get($name);
	}

	/**
	 * Returns a model by name
	 * or for current class if name is not specified
	 *
	 * @param string $name
	 */
	public function getModel($name = null)
	{
		if (!$name) {
			$name = __CLASS__;
			if (strpos($name, 'Model') !== false)
				$name = substr($name, 0, strpos($name, 'Model'));
			if (strpos($name, 'Repository') !== false)
				$name = substr($name, 0, strpos($name, 'Repository'));
			if (strpos($name, 'Service') !== false)
				$name = substr($name, 0, strpos($name, 'Service'));
		}

		return $this->get('model')->get($name);
	}

}