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
        $result = $numbersObj->add($numbers);
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
        $this->assertIsInt($numberObj->add($numbers));
    }
}
