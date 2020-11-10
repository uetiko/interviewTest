<?php

declare(strict_types=1);

namespace Uetiko\Infotec\Test\Calculator;

use InvalidArgumentException;
use Uetiko\Infotec\Calculator\Sum;
use PHPUnit\Framework\TestCase;

class SumTest extends TestCase
{
    public function stringProvider(): array
    {
        return [
            ["2,4,6,8"],
            ["32, 28"],
            ["d,f"],
        ];
    }

    public function arrayIntProvider(): array
    {
        return [
            [
                [4,8,3],
                [8,3,4,2],
                [31,46,85,64]
            ]
        ];
    }

    public function wrongStringProvider(): array
    {
        return [
            [""]
        ];
    }
    /**
     * @test
     * @dataProvider stringProvider
     * @covers \Uetiko\Infotec\Calculator\Sum
     */
    public function sumString(string $numbers){
        $numbersObj = new Sum();
        $result = $numbersObj->sumArray($numbers);
        $this->assertIsInt($result);
    }

    /**
     * @test
     * @dataProvider wrongStringProvider
     * @covers \Uetiko\Infotec\Calculator\Sum
     */
    public function wrongDataArgument(string $numbers)
    {
        $numberObj = new Sum();
        $this->expectException(InvalidArgumentException::class);
        $this->assertIsInt($numberObj->sumArray($numbers));
    }

    /**
     * @test
     * @dataProvider stringProvider
     * @covers \Uetiko\Infotec\Calculator\Sum::sumArrayReduce
     */
    public function sumReduce(string $test)
    {
        $number = new Sum();
        $this->assertEquals(6, $number->sumArrayReduce('1, 2, 3'));
        $this->assertIsInt($number->sumArrayReduce($test));
    }

    /**
     * @test
     * @dataProvider arrayIntProvider
     * @covers \Uetiko\Infotec\Calculator\Sum::cubSum
     */
    public function cubSum(array $nums)
    {
        $num = new Sum();
        $this->assertEquals(855, $num->cubSum([1,5,9]));
        $this->assertIsInt($num->cubSum($nums));
    }
}
