<?php

declare(strict_types=1);

namespace Uetiko\Infotec\Test\Calculator;

use Exception;
use ArrayObject;
use Uetiko\Infotec\Calculator\CountWords;
use PHPUnit\Framework\TestCase;

class CountWordsTest extends TestCase
{
    public function textProvider(): array
    {
        return [
            ["Heres a small function I wrote to stop people from submitting data that is ALL IN CAPS SO THEY CAN GET MORE ATTENTION THAT THE REST OF THE USER SUBMITTED DATA on my website :) If you can make it better, by all means do so. This function splits up words delimited by a space, and makes only the first letter of each word capitalized. You can easily modify it so it's only the very first word of the string. I've also added some exceptions so you don't make things like roman numerals look like \"Iii\" or \"Xcmii\" or something."],
            ["John Gruber creó el lenguaje Markdown en 2004, con una ayuda importante de Aaron Swartz en la sintaxis. Gruber tenía la meta de hacer que la gente «pudiera escribir usando un formato de texto plano fácil-de-leer y fácil-de-escribir, y con la posibilidad de poder convertir su documento en XHTML (o HTML) válido"],
            ["Markdown es un lenguaje de marcado ligero creado por John Gruber que trata de conseguir la máxima legibilidad y facilidad de publicación tanto en su forma de entrada como de salida, inspirándose en muchas convenciones existentes para marcar mensajes de correo electrónico usando texto plano. Se distribuye bajo licencia BSD y se distribuye como plugin (o al menos está disponible) en diferentes sistemas de gestión de contenidos (CMS)."],
            ["es una palabra que se repite, es algo que se ve"]
        ];
    }

    public function namesBobProvider(): array
    {
        return [
            [
                ["Armando", "Bob", "Alice"]
            ]
        ];
    }

    public function namesBobMissing(): array
    {
        return [
            [
                ["Jimmy", "James", "Ana"]
            ]
        ];
    }

    /**
     * @test
     * @dataProvider textProvider
     * @covers \Uetiko\Infotec\Calculator\CountWords::count
     */
    public function countWords(string $text)
    {
        $count = new CountWords($text);
        $this->assertInstanceOf(ArrayObject::class, $count->count());
    }

    /**
     * @test
     * @dataProvider namesBobProvider
     * @covers \Uetiko\Infotec\Calculator\CountWords::whereIsBob
     * @param array $names
     * @throws \Exception
     */
    public function whereIsBob(array $names)
    {
        $count = new CountWords('');
        $this->assertIsInt($count->whereIsBob($names));
        $this->assertEquals(1, $count->whereIsBob($names));
    }

    /**
     * @test
     * @dataProvider namesBobMissing
     * @covers \Uetiko\Infotec\Calculator\CountWords::whereIsBob
     * @param array $names
     */
    public function whereIsBobMissing(array $names)
    {
        $this->expectException(Exception::class);
        $count = new CountWords('');
        $this->assertIsInt($count->whereIsBob($names));
    }
}
