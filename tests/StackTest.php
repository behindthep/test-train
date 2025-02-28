<?php

namespace Train\Tests\Stack\Tests;

use PHPUnit\Framework\TestCase;

use function Train\Tests\Stack\{make, push, pop, isEmpty};

class StackTest extends TestCase
{
    public function testMainFlow(): void
    {
        $stack = make();
        push($stack, 'one');
        push($stack, 'two');
        $value1 = pop($stack);
        $this->assertEquals('two', $value1);
        $value2 = pop($stack);
        $this->assertEquals('one', $value2);
    }

    public function testIsEmpty(): void
    {
        $stack = make();
        $this->assertTrue(isEmpty($stack));
        push($stack, 'one');
        $this->assertFalse(isEmpty($stack));
        pop($stack);
        $this->assertTrue(isEmpty($stack));
    }

    public function testPop(): void
    {
        // Ожидание ставится до вызова кода
        $this->expectException(\Exception::class);
        $stack = make();
        pop($stack); // Boom!
    }
}
