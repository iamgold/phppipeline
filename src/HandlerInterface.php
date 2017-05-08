<?php

namespace iamgold\phppipeline;

/**
 * This interface is used to define a handler and all handler must
 * implement this interface.
 *
 * @author Eric Huang <iamgold0105@gmail.com>
 * @version 0.1.0
 */
interface HandlerInterface
{
	/**
	 * Handle
	 *
	 * @param mixed $params
	 * @return mixed
	 */
	public function handle($params);
}
