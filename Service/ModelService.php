<?php
/**
 * This is a service which knows how to connect a model
 *
 * @author Mike
 */
class ModelService
{
	use ServiceProvider;

	private $models = array();

	/**
	 * Returns the Model by name
	 *
	 * @param unknown $name
	 * @throws Exception
	 * @return multitype:
	 */
	public function get($name)
	{
		if (!$name)
			throw new Exception("Model name is required.");

		$modelName = ucfirst($name) . 'Model';

		if (!array_key_exists($modelName, $this->models))
			if (class_exists($modelName))
				$this->models[$modelName] = new $modelName();
			else
				throw new Exception("Model {$modelName} does not exist.");

		return $this->models[$modelName];
	}
}
