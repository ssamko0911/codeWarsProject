<?php declare(strict_types=1);

namespace Tests\Task276;

use App\Task276\Solution;
use PHPUnit\Framework\TestCase;

final class SolutionTest extends TestCase
{
    public function testBasicCaseWithNoErrors(): void
    {
        self::assertSame(
            4,
            Solution::count_salutes('<---->---<---<-->')
        );
    }

    public function testNoMeetingsOccurWithinEmptyHallway(): void
    {
        self::assertSame(
            0,
            Solution::count_salutes('--------------')
        );
    }

    public function testNoMeetingsOccurInOneDirectionMovement(): void
    {
        self::assertSame(
            0,
            Solution::count_salutes('-->>>>>>>----')
        );
    }

    public function testGroupMeetsOnePerson(): void
    {
        self::assertSame(
            42,
            Solution::count_salutes('>>>>>>>>>>>>>>>>>>>>>----<->')
        );
    }
}
