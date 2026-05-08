<?php declare(strict_types=1);

namespace App\task214\Enums;
enum Character: string
{
    case ROCK = 'rock';
    case PAPER = 'paper';
    case SCISSORS = 'scissors';
    case LIZARD = 'lizard';
    case SPOCK = 'spock';

    /** @return Character[] */
    public function getPowers(): array
    {
        return match ($this) {
            self::ROCK => [self::LIZARD, self::SCISSORS],
            self::PAPER => [self::ROCK, self::SPOCK],
            self::SCISSORS => [self::PAPER, self::LIZARD],
            self::LIZARD => [self::SPOCK, self::PAPER],
            self::SPOCK => [self::SCISSORS, self::ROCK],
        };
    }
}
