<?php

namespace iamgold\phppipeline;

/**
 * This is an abstract class of handler.
 * All handler must extends this class.
 *
 * @author Eric Huang <iamgold0105@gmail.com>
 * @version 1.0.0
 */
abstract class AbstractHandler
{
    /**
     * Storing next handler
     *
     * @var AbstractHandler $next
     */
    protected $next;

    /**
     * to next
     *
     * @param mixed $payload
     *
     * @return mixed
     */
    protected function toNext($payload)
    {
        if ($this->next)
            return $this->next->handle($payload);

        return $payload;
    }

    /**
     * Set next handler
     *
     * @param AbstractHandler $nextHandler
     * @return void
     */
    public function setNext(AbstractHandler &$nextHandler)
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

    /**
     * @var mixed $payload
     */
    abstract public function handle($payload);
}
