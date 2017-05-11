<?php

namespace iamgold\phppipeline;

/**
 * This is a trait class for defined a handler and
 * all handler must use this trait.
 *
 * @author Eric Huang <iamgold0105@gmail.com>
 * @version 0.1.0
 */
trait HandlerTrait
{
	/**
	 * Storing next handler
	 *
	 * @var HandlerInterface $next
	 */
	protected $next;

	/**
	 * Set next handler
	 *
	 * @param HandlerInterface $nextHandler
	 * @return void
	 */
	public function setNext(HandlerInterface &$nextHandler)
	{
		$this->next = $nextHandler;
	}

	/**
	 * Get class name
	 *
	 * @return string
	 */
	public static function className()
	{
		return get_called_class();
	}
}
