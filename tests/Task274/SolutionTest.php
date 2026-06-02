<?php declare(strict_types=1);

namespace Tests\Task274;

use App\Task274\Solution;
use PHPUnit\Framework\TestCase;

class SolutionTest extends TestCase
{
    public function testBasicCaseWithNoErrors(): void
    {
        self::assertSame(
            'ten',
            Solution::wallPaper(4.0, 3.5, 3.0)
        );
    }

    public function testLengthOrWidthEqualsZeroReturnsZero(): void
    {
        self::assertSame(
            'zero',
            Solution::wallPaper(0.0, 3.5, 3.0)
        );
    }

    public function testGreaterValuesReturnNull(): void
    {
        self::assertNull(Solution::wallPaper(20.0, 3.5, 3.0));
    }
}
