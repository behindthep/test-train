<?php

namespace Train\Tests\StringUtils\Tests;

// use Webmozart\Assert\Assert;
use PHPUnit\Framework\TestCase;

use function Train\Tests\StringUtils\{capitalize, reverseString};

class StringUtilsTest extends TestCase
{
    protected $actual;
    protected $expected;

    protected function setUp(): void
    {
        $pathToInputString = $this->getFixtureFullPath('inputString.txt');
        $pathToReversedString = $this->getFixtureFullPath('resultString.txt');

        $this->actual = file_get_contents($pathToInputString);
        $this->expected = file_get_contents($pathToReversedString);

        // $this->expected = file_get_contents(realpath(__DIR__ . '/../tests/fixtures/result.html'));
    }

    // public function extensionProvider()
    // {
    //     return [ ['json'], ['yaml'], ['csv'] ];
    // }

    /**
     * @dataProvider extensionProvider
     */
    // public function testToHtmlList($extension): void
    // {
    //     $filepath = realpath(__DIR__ . "/../tests/fixtures/list.{$extension}");
    //     $actual = toHtmlList($filepath);
    //     $this->assertEquals($this->expected, $actual);
    // }

    public function getFixtureFullPath($fixtureName)
    {
        $parts = [__DIR__, 'fixtures', $fixtureName];
        return realpath(implode('/', $parts));
    }

    public function testReverse(): void
    {
        $this->assertEquals(
            trim($this->expected),
            trim(reverseString($this->actual))
        );
    }

    public function testCapitalize(): void
    {
        // Assert::eq(capitalize(''), '', 'Пограничный случай: пустая строка');
        $this->assertEquals('', capitalize(''));
        $this->assertEquals('Hello', capitalize('hello'));
    }
}
