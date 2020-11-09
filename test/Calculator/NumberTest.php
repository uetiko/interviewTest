<?php

declare(strict_types=1);

namespace Uetiko\Infotec\Test\Calculator;

use Uetiko\Infotec\Calculator\Number;
use PHPUnit\Framework\TestCase;

class NumberTest extends TestCase
{
    public function primeNumberProvider(): array
    {
        return [
            [3],
            [5],
            [7],
            [11],
            [13],
            [17]
        ];
    }

    public function noPrimeNumberProvider(): array
    {
        return [
            [4],
            [6],
            [8],
            [9],
            [10],
            [12]
        ];
    }
    /**
     * @test
     * @dataProvider primeNumberProvider
     * @covers \Uetiko\Infotec\Calculator\Number::prime
     */
    public function primeNumber(int $value)
    {
        $number = new Number();
        $this->assertTrue($number->prime($value));
    }

    /**
     * @test
     * @dataProvider noPrimeNumberProvider
     * @covers \Uetiko\Infotec\Calculator\Number::prime
     */
    public function noPrimeNumber(int $value)
    {
        $number = new Number();
        $this->assertFalse($number->prime($value));
    }

    /**
     * @test
     * @covers \Uetiko\Infotec\Calculator\Number::countPrimes
     */
    public function howManyPrimesAreThere()
    {
        $number = new Number();
        $this->assertEquals(4, $number->countPrimes(10));
        $this->assertEquals(10, $number->countPrimes(30));
    }
}
