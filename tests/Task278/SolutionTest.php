<?php declare(strict_types=1);

namespace Tests\Task278;

use App\Task278\Solution;
use PHPUnit\Framework\TestCase;

class SolutionTest extends TestCase
{
    public function testBasicCase(): void
    {
        self::assertSame(
            '0.1.2.2.3',
            Solution::wordPattern('hello')
        );
    }

    public function testUpperCaseString(): void
    {
        self::assertSame(
            '0.1.2.2.3',
            Solution::wordPattern('HELLO')
        );
    }

    public function testEmptyString(): void
    {
        self::assertSame(
            '',
            Solution::wordPattern('')
        );
    }

    public function testRepeatedSequence(): void
    {
        self::assertSame(
            '0.0.0',
            Solution::wordPattern('ttt')
        );
    }

    public function testLongString(): void
    {
        self::assertSame(
            '0.1.2.2.3.2.3.4.3.5.3.6.7.4.8.3.7.9.7.10.11.1.2.2.9.12.13.14.1.3.2.0.3.15.1.13',
            Solution::wordPattern('Hippopotomonstrosesquippedaliophobia')
        );
    }
}
