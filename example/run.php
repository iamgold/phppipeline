<?php

namespace example;

use iamgold\phppipeline\{AbstractHandler, HandlerList};

require __DIR__ . '/../vendor/autoload.php';

/**
 * Double handler
 */
class DoubleHandler extends AbstractHandler
{
    /**
     * {@inheridoc}
     */
    public function handle($payload)
    {
        if (!is_array($payload))
            throw new Exception("Invalid input", 400);


        foreach($payload as $idx=>$value) {
            if (is_string($value) || is_integer($value))
                $value = (int) $value;
            else
                $value = 0;

            $value *= 2;
            $payload[$idx] = $value;
        }

        return $this->toNext($payload);
    }
}

/**
 * Sum handler
 */
class SumHandler extends AbstractHandler
{
    /**
     * {@inheridoc}
     */
    public function handle($payload)
    {
        if (!is_array($payload))
            throw new Exception("Invalid input", 400);

        $sum = 0;
        foreach($payload as $idx=>$value) {
            $sum += $value;
        }

        return $this->toNext($sum);
    }
}

// create execute command by HandleList
$command = (new HandlerList)->add(new DoubleHandler)
                            ->add(new SumHandler)
                            ->resolve();

$scores = [10, 20, 30];

echo $command->exec($scores);
