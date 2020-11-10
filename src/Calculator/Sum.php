<?php

declare(strict_types=1);

namespace Uetiko\Infotec\Calculator;

use InvalidArgumentException;

class Sum
{
    /**
     * @param string $numbers
     * @return int
     * @throws InvalidArgumentException
     */
    private function isValid(string $numbers): void
    {
        if (empty($numbers)) {
            throw new InvalidArgumentException("The string is empty");
        }
    }

    public function sumArray(string $numbers): int
    {
        $result = 0;
        $this->isValid($numbers);
        foreach (explode(',', $numbers) as $number){
            $result += (int)$number;
        }
        return $result;
    }

    public function sumArrayReduce(string $numbers):int
    {
        $this->isValid($numbers);

        return array_reduce(
            explode(',', $numbers),
            function($carry, $item){
                return ($carry + (int)$item);
            },
            0
        );
    }

    public function cubSum(array $numbers): int
    {
        return array_reduce(
            $numbers,
            function ($carry, $item){
                return $carry + pow($item, 3);
            },
            0
        );
    }
}
