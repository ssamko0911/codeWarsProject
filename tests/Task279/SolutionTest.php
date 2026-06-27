<?php declare(strict_types=1);

namespace Tests\Task279;

use App\Task279\Solution;
use PHPUnit\Framework\TestCase;

class SolutionTest extends TestCase
{
    public function testBasicCase(): void
    {
        $actualAsArray = str_split(Solution::lastSurvivors('abaa'));
        sort($actualAsArray);
        $actual = implode($actualAsArray);

        self::assertSame('ac', $actual);
    }

    public function testLastLetterStepCase(): void
    {
        $actualAsArray = str_split(Solution::lastSurvivors('zzab'));
        sort($actualAsArray);
        $actual = implode($actualAsArray);

        self::assertSame('c', $actual);
    }

    public function testSeveralPairsCase(): void
    {
        $actualAsArray = str_split(Solution::lastSurvivors('abcabc'));
        sort($actualAsArray);
        $actual = implode($actualAsArray);

        self::assertSame('bcd', $actual);
    }

    public function testEmptyString(): void
    {
        self::assertSame('', Solution::lastSurvivors(''));
    }

    public function testRandomCase(): void
    {
        $actualAsArray = str_split(
            Solution::lastSurvivors(
                'xsdlafqpcmjytoikojsecamgdkehrqqgfknlhoudqygkbxftivfbpxhxtqgpkvsrfflpgrlhkbfnyftwkdebwfidmpauoteahyh'
            )
        );
        sort($actualAsArray);
        $actual = implode($actualAsArray);

        self::assertSame('acdeghlmnqrvyz', $actual);
    }
}