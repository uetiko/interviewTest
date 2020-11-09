<?php

declare(strict_types=1);

namespace Uetiko\Infotec\Calculator;


class Number
{
    public function prime(int $number): bool
    {
        $result = true;
        for($x =2; $x <= ($number-1); $x++) {
            if (($number % $x) == 0){
                $result = false;
                break;
            }
        }

        return $result;
    }

    public function countPrimes(int $number): int
    {
        $count = 0;
        for($x = 2; $x <= $number; $x++){
            if($this->prime($x)){
                $count++;
            }
        }
        return $count;
    }
}
