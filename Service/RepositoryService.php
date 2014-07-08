<?php
/**
 * This is a service which knows how to connect a repository
 * Nothing special
 *
 * @author Mike
 */
class RepositoryService
{
	use ServiceProvider;

	private $repositories = array();

	/**
	 * Returns the Repository by name
	 *
	 * @param unknown $name
	 * @throws Exception
	 * @return multitype:
	 */
	public function get($name)
	{
		if (!$name)
			throw new Exception("Repository name is required.");

		$repositoryName = ucfirst($name) . 'Repository';

		if (!array_key_exists($repositoryName, $this->repositories))
			if (class_exists($repositoryName))
				$this->repositories[$repositoryName] = new $repositoryName();
			else
				throw new Exception("Repository {$repositoryName} does not exist.");

		return $this->repositories[$repositoryName];
	}
}
