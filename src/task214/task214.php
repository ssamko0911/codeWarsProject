<?php declare(strict_types=1);

//https://www.codewars.com/kata/57d29ccda56edb4187000052

require_once __DIR__ . '/../../vendor/autoload.php';

use App\task214\Entity\Game;
use App\task214\Entity\Player;
use App\task214\Enums\Character;

const WINNER_LABEL = 'Player %d Won!';
const DRAW_LABEL = 'Draw!';

function rpsls(string $player1, string $player2): string
{
    $firstPlayer = new Player(Character::from(strtolower($player1)), 1);
    $secondPlayer = new Player(Character::from(strtolower($player2)), 2);

    $winner = (new Game($firstPlayer, $secondPlayer))->getWinner();

    if (null === $winner) {
        return DRAW_LABEL;
    }

    return sprintf(WINNER_LABEL, $winner->getId());
}

//submitted

//final class Character
//{
//    public const ROCK = 'rock';
//    public const PAPER = 'paper';
//    public const SCISSORS = 'scissors';
//    public const LIZARD = 'lizard';
//    public const SPOCK = 'spock';
//
//    private const VALID = [
//        self::ROCK,
//        self::PAPER,
//        self::SCISSORS,
//        self::LIZARD,
//        self::SPOCK,
//    ];
//
//    public static function from(string $value): string
//    {
//        if (!in_array($value, self::VALID, true)) {
//            throw new ValueError("Invalid character: $value");
//        }
//        return $value;
//    }
//
//    /** @return string[] */
//    public static function getPowers(string $character): array
//    {
//        return match ($character) {
//            self::ROCK     => [self::LIZARD, self::SCISSORS],
//            self::PAPER    => [self::ROCK, self::SPOCK],
//            self::SCISSORS => [self::PAPER, self::LIZARD],
//            self::LIZARD   => [self::SPOCK, self::PAPER],
//            self::SPOCK    => [self::SCISSORS, self::ROCK],
//        };
//    }
//}
//
//final class Player
//{
//    public function __construct(
//        private string $character,
//        private int    $id,
//    ) {}
//
//    public function getCharacter(): string
//    {
//        return $this->character;
//    }
//
//    public function getId(): int
//    {
//        return $this->id;
//    }
//
//    /** @return string[] */
//    public function getPowers(): array
//    {
//        return Character::getPowers($this->character);
//    }
//}
//
//final class Game
//{
//    public function __construct(
//        private Player $playerOne,
//        private Player $playerTwo,
//    )
//    {
//    }
//
//    public function getWinner(): ?Player
//    {
//        if ($this->playerOne->getCharacter() === $this->playerTwo->getCharacter()) {
//            return null;
//        }
//
//        if (!in_array($this->playerOne->getCharacter(), $this->playerTwo->getPowers())) {
//            return $this->playerOne;
//        }
//
//        return $this->playerTwo;
//    }
//}
//
//const WINNER_LABEL = 'Player %d Won!';
//const DRAW_LABEL = 'Draw!';
//
//function rpsls(string $player1, string $player2): string
//{
//    $firstPlayer  = new Player(Character::from(strtolower($player1)), 1);
//    $secondPlayer = new Player(Character::from(strtolower($player2)), 2);
//
//    $winner = (new Game($firstPlayer, $secondPlayer))->getWinner();
//
//    if (null === $winner) {
//        return DRAW_LABEL;
//    }
//
//    return sprintf(WINNER_LABEL, $winner->getId());
//}




