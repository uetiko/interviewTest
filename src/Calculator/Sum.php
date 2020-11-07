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
    public function add(string $numbers): int
    {
        if (empty($numbers)) {
            throw new InvalidArgumentException("The string is empty");
        }

        return $this->sumArray(explode(',', $numbers));
    }

    private function sumArray(array $numbers): int
    {
        $result = 0;
        foreach ($numbers as $number){
            $result += (int)$number;
        }
        return $result;
    }
}
