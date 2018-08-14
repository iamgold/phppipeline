<?php

namespace iamgold\phppipeline;

/**
 * This is a trait class for defined a handler and
 * all handler must use this trait.
 *
 * @author Eric Huang <iamgold0105@gmail.com>
 * @version 0.2.0
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
	 * to next
	 *
	 * @param array $payload
	 *
	 * @return mixed
	 */
	public function toNext(array $payload)
	{
		if ($this->next)
			return $this->next->handle($payload);

		return $payload;
	}

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
