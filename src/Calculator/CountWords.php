<?php

declare(strict_types=1);

namespace Uetiko\Infotec\Calculator;

use ArrayObject;

class CountWords
{
    /** @var string $text  */
    private $text;
    /** @var ArrayObject $hashTable */
    private $hashTable;

    public function __construct(string $text)
    {
        $this->text = $text;
    }

    public function count(): ArrayObject
    {
        $this->hashTable = new ArrayObject();
        $separteWords = explode(" ", str_replace([
                '.', ',', ':', ';', '?', '¿', '¡', '!', '"', '-', '(', ')'
            ],
                '',
                $this->text)
        );
        foreach ($separteWords as $word) {
            $word = strtolower($word);
            if ($this->hashTable->offsetExists($word)) {
                $count = $this->hashTable->offsetGet($word) +1;
                $this->hashTable->offsetSet($word, $count);
            } else {
                $this->hashTable->offsetSet($word, 1);
            }
        }

        return $this->hashTable;
    }

    public function printResult(): void
    {
        foreach ($this->count() as $word => $value){
            print_r("word:{$word} == value:{$value}\n");
        }
    }
}
