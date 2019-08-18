<?php

namespace iamgold\phppipeline;

/**
 * This class is a abstract layer for run a chain of handler.
 *
 * @author Eric Huang <iamgold0105@gmail.com>
 * @version 1.0.0
 */
class Command
{
	/**
	 * @var AbstractHandler $handler
	 */
	private $handler;

	/**
	 * Construct
	 *
	 * @param iamgold\phppipeline\AbstractHandler $handler
	 */
	public function __construct(AbstractHandler $handler)
	{
		$this->handler = &$handler;
	}

	/**
	 * Exceute this command
	 *
	 * @param mixed $params
	 * @return mixed
	 */
	public function exec($params)
	{
		return $this->handler->handle($params);
	}
}
