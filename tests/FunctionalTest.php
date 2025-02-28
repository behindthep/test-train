<?php

namespace Train\Tests\Functional\Tests;

use PHPUnit\Framework\TestCase;
use Functional;

class FunctionalTest extends TestCase
{
    private $coll;

    public function setUp(): void
    {
        $this->coll = ['One', true, 3, 10, 'cat', [], '', 10, false];
    }

    public function testFilter(): void
    {
        $result = array_values(Functional\filter($this->coll, fn($element) => is_numeric($element)));
        $expected = [3, 10, 10];
        $this->assertEquals($expected, $result);
    }

    public function testZip(): void
    {
        $coll2 = range(1, 9); // коллекция конкретно для данного теста
        $result = Functional\zip($this->coll, $coll2);
        $expected = [['One', 1], [true, 2], [3, 3], [10, 4], ['cat', 5], [[], 6], ['', 7], [10, 8], [false, 9]];
        $this->assertEquals($expected, $result);
    }
}
