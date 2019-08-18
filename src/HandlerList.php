<?php

namespace iamgold\phppipeline;

use Exception;

/**
 * This class likely an array for collecting handler.
 * It will create a handler chain when resolve as a command.
 *
 * @author Eric Huang <iamgold0105@gmail.com>
 * @version 1.0.0
 */
class HandlerList
{
	/**
	 * @var array $queue
	 */
	private $queue = [];

	/**
	 * Reset list queue
	 *
	 * @return void
	 */
	public function clear()
	{
		$this->queue = null;
		$this->queue = [];
	}

	/**
	 * Add a handler
	 *
	 * @param AbstractHandler $handler
	 * @param string $name default: ''
	 * @return self
	 */
	public function add(AbstractHandler $handler, $name='')
	{
		$name = trim($name);
		if (!empty($name))
			$this->queue[$name] = $handler;
		else
			$this->queue[] = $handler;

		return $this;
	}

	/**
	 * Remove a handler by specific name
	 *
	 * @param string $name
	 * @return void
	 */
	public function remove($name)
	{
		$name = trim($name);
		if (!empty($name) && isset($this->queue[$name]))
			$this->queue[$name] = null;
	}

	/**
	 * Resolve queue of the list
	 *
	 * @return Command
	 */
	public function resolve()
	{
		$bootstrap = null;
		$parent = null;
		foreach($this->queue as $idx=>&$handler) {
			if ($bootstrap===null) {
				$bootstrap = $handler;
			} else {
				$parent->setNext($handler);
			}

			$parent = $handler;
		}

		if ($bootstrap===null)
			throw new Exception("No defined handler");

		return new Command($bootstrap);
	}
}
