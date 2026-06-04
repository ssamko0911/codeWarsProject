<?php declare(strict_types=1);

namespace Tests\Task277;

use App\Task277\Solution;
use PHPUnit\Framework\TestCase;

final class SolutionTest extends TestCase
{
    public function testBasicCaseOddsWin(): void
    {
        self::assertSame(
            'odds win',
            Solution::bitsBattle([5, 3, 14])
        );
    }

    public function testBasicCaseEvensWin(): void
    {
        self::assertSame(
            'evens win',
            Solution::bitsBattle([3, 8, 22, 15, 78])
        );
    }

    public function testBasicCaseTie(): void
    {
        self::assertSame(
            'tie',
            Solution::bitsBattle([1, 13, 16])
        );
    }

    public function testEmptyArrayResultTie(): void
    {
        self::assertSame(
            'tie',
            Solution::bitsBattle([])
        );
    }
}
