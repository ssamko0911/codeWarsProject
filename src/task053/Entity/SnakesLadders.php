<?php

declare(strict_types=1);

namespace App\task053\Entity;

use App\task053\GameValidator\GameValidator;

class SnakesLadders
{
    public array $snakes = [
        [
            'start' => 16,
            'end' => 6,
        ],
        [
            'start' => 46,
            'end' => 25,
        ],
        [
            'start' => 49,
            'end' => 11,
        ]
        ,
        [
            'start' => 62,
            'end' => 19,
        ]
        ,
        [
            'start' => 64,
            'end' => 60,
        ],
        [
            'start' => 74,
            'end' => 53,
        ],
        [
            'start' => 89,
            'end' => 68,
        ],
        [
            'start' => 92,
            'end' => 88,
        ],
        [
            'start' => 95,
            'end' => 75,
        ],

        [
            'start' => 99,
            'end' => 80,
        ],
    ];

    public array $ladders = [
        [
            'start' => 2,
            'end' => 38,
        ],
        [
            'start' => 7,
            'end' => 14,
        ],
        [
            'start' => 8,
            'end' => 31,
        ]
        ,
        [
            'start' => 15,
            'end' => 26,
        ]
        ,
        [
            'start' => 21,
            'end' => 42,
        ],
        [
            'start' => 28,
            'end' => 84,
        ],
        [
            'start' => 36,
            'end' => 44,
        ],
        [
            'start' => 51,
            'end' => 67,
        ],

        [
            'start' => 71,
            'end' => 91,
        ],
        [
            'start' => 78,
            'end' => 98,
        ],
        [
            'start' => 87,
            'end' => 94,
        ],
    ];

    public int $finalScore = 100;

    public bool $isPlayerOneTurn = true;

    public Player $playerOne;

    public Player $playerTwo;

    public GameValidator $validator;

    public int $dupLimit = 1;

    function __construct(
    )
    {
        $this->playerOne = new Player(1);
        $this->playerTwo = new Player(2);
        $this->validator = new GameValidator();
    }

    public function play($die1, $die2)
    {
        $dupCount = 0;
        if ($this->validator->isEqualDiceValues($die1, $die2)) {
            $dupCount = 1;
        }

        $preparedDice = [
            'diceOne' => $die1,
            'diceTwo' => $die2,
            'duplicate' => $die1 === $die2,
            'dupCount' => $dupCount,
        ];

        if ($this->isPlayerOneTurn) {
            $makeTurn = 'playerOne';
            $this->isPlayerOneTurn = false;
        } else {
            $makeTurn = 'playerTwo';
            $this->isPlayerOneTurn = true;
        }

            // get current position of player;
        if ($this->playerOne->getPosition() === $this->finalScore
            || $this->playerTwo->getPosition() === $this->finalScore
        ) {
            return 'Game over!';
        }


        $nextTurn = $this->$makeTurn->makeMove($preparedDice);

        $isSnakeCatch = false;
        foreach ($this->snakes as $snake) {
            if ($nextTurn === $snake['start']) {
                $nextTurn = $snake['end'];
                echo 'Snake: ' . $snake['start'] . ', position: ' . $snake['end'] . PHP_EOL;
                $isSnakeCatch = true;
                break;
            }
        }

        if (!$isSnakeCatch) {
            foreach ($this->ladders as $ladder) {
                if ($nextTurn === $ladder['start']) {
                    $nextTurn = $ladder['end'];
                    echo 'Ladder: ' . $ladder['start'] . ', position: ' . $ladder['end'] . PHP_EOL;

                    break;
                }
            }
        }

        if ($preparedDice['duplicate'] && $preparedDice['dupCount'] <= 1 && $makeTurn === 'playerOne') {
            $this->isPlayerOneTurn = true;
        } else if ($preparedDice['duplicate'] && $preparedDice['dupCount'] <= 1 && $makeTurn === 'playerTwo'){
            $this->isPlayerOneTurn = false;
        }

        $this->$makeTurn->setPosition($nextTurn);

        if ($this->$makeTurn->getPosition() > $this->finalScore) {
            $newPosition = $this->finalScore - ($this->$makeTurn->getPosition() - $this->finalScore);

            $isSnakeCatch = false;
            foreach ($this->snakes as $snake) {
                if ($newPosition === $snake['start']) {
                    $newPosition = $snake['end'];
                    $isSnakeCatch = true;
                    break;
                }
            }

            $this->$makeTurn->setPosition($newPosition);
        }

        if ($this->$makeTurn->getPosition() === $this->finalScore) {
            return "Player {$this->$makeTurn->getPlayerId()} Wins!";
        }

        return sprintf('Player %d is on square %d', $this->$makeTurn->getplayerId(), $this->$makeTurn->getPosition());
    }

    public function bounceBack(Player $player): int
    {
        return $this->finalScore - ($player->getPosition() - $this->finalScore);
    }
}

// working



//class SnakesLadders {
//    public $snakes = [
//        [
//            'start' => 16,
//            'end' => 6,
//        ],
//        [
//            'start' => 46,
//            'end' => 25,
//        ],
//        [
//            'start' => 49,
//            'end' => 11,
//        ]
//        ,
//        [
//            'start' => 62,
//            'end' => 19,
//        ],
//        [
//            'start' => 74,
//            'end' => 53,
//        ]
//        ,
//        [
//            'start' => 64,
//            'end' => 60,
//        ],
//        [
//            'start' => 89,
//            'end' => 68,
//        ],
//        [
//            'start' => 92,
//            'end' => 88,
//        ],
//        [
//            'start' => 95,
//            'end' => 75,
//        ],
//
//        [
//            'start' => 99,
//            'end' => 80,
//        ],
//    ];
//
//    public $ladders = [
//        [
//            'start' => 2,
//            'end' => 38,
//        ],
//        [
//            'start' => 7,
//            'end' => 14,
//        ],
//        [
//            'start' => 8,
//            'end' => 31,
//        ]
//        ,
//        [
//            'start' => 15,
//            'end' => 26,
//        ]
//        ,
//        [
//            'start' => 21,
//            'end' => 42,
//        ],
//        [
//            'start' => 28,
//            'end' => 84,
//        ],
//        [
//            'start' => 36,
//            'end' => 44,
//        ],
//        [
//            'start' => 51,
//            'end' => 67,
//        ],
//
//        [
//            'start' => 71,
//            'end' => 91,
//        ],
//        [
//            'start' => 78,
//            'end' => 98,
//        ],
//        [
//            'start' => 87,
//            'end' => 94,
//        ],
//    ];
//
//    public $finalScore = 100;
//
//    public $isPlayerOneTurn = true;
//
//    public $playerOne;
//
//    public $playerTwo;
//
//
//    function __construct()
//    {
//        $this->playerOne = new Player(1);
//        $this->playerTwo = new Player(2);
//    }
//
//    public function play($die1, $die2)
//    {
//        $dupCount = 0;
//        if ($die1 === $die2) {
//            $dupCount = 1;
//        }
//
//        $preparedDice = [
//            'diceOne' => $die1,
//            'diceTwo' => $die2,
//            'duplicate' => $die1 === $die2,
//            'dupCount' => $dupCount,
//        ];
//
//
//        if ($this->isPlayerOneTurn) {
//            $makeTurn = 'playerOne';
//            $this->isPlayerOneTurn = false;
//        } else {
//            $makeTurn = 'playerTwo';
//            $this->isPlayerOneTurn = true;
//        }
//
//        if ($this->playerOne->getPosition() === $this->finalScore
//            || $this->playerTwo->getPosition() === $this->finalScore
//        ) {
//            return 'Game over!';
//        }
//
//        echo $makeTurn;
//        echo $this->$makeTurn->getPosition();
//        print_r($preparedDice);
//
//        $nextTurn = $this->$makeTurn->makeMove($preparedDice);
//
//        $isSnakeCatch = false;
//        foreach ($this->snakes as $snake) {
//            if ($nextTurn === $snake['start']) {
//                $nextTurn = $snake['end'];
//                $isSnakeCatch = true;
//                break;
//            }
//        }
//
//        if (!$isSnakeCatch) {
//            foreach ($this->ladders as $ladder) {
//                if ($nextTurn === $ladder['start']) {
//                    $nextTurn = $ladder['end'];
//                    break;
//                }
//            }
//        }
//
//        if ($preparedDice['duplicate'] && $preparedDice['dupCount'] <= 1 && $makeTurn === 'playerOne') {
//            $this->isPlayerOneTurn = true;
//        } else if ($preparedDice['duplicate'] && $preparedDice['dupCount'] <= 1 && $makeTurn === 'playerTwo'){
//            $this->isPlayerOneTurn = false;
//        }
//
//        $this->$makeTurn->setPosition($nextTurn);
//
//        if ($this->$makeTurn->getPosition() > $this->finalScore) {
//            $newPosition = $this->finalScore - ($this->$makeTurn->getPosition() - $this->finalScore);
//
//            $isSnakeCatch = false;
//            foreach ($this->snakes as $snake) {
//                if ($newPosition === $snake['start']) {
//                    $newPosition = $snake['end'];
//                    $isSnakeCatch = true;
//                    break;
//                }
//            }
//
//            $this->$makeTurn->setPosition($newPosition);
//
//        }
//
//        if ($this->$makeTurn->getPosition() === $this->finalScore) {
//            return "Player {$this->$makeTurn->getPlayerId()} Wins!";
//        }
//
//        return sprintf('Player %d is on square %d', $this->$makeTurn->getplayerId(), $this->$makeTurn->getPosition());
//    }
//
//    public function bounceBack(Player $player): int
//    {
//        return $this->finalScore - ($player->getPosition() - $this->finalScore);
//    }
//}
//
//class Player
//{
//    private $position = 0;
//    private $playerId;
//
//    public function __construct($playerId) {
//        $this->playerId = $playerId;
//    }
//
//    public function getPlayerId(): int
//    {
//        return $this->playerId;
//    }
//
//    public function rollDice(): array
//    {
//        $diceOne = rand(1, 6);
//        $diceTwo = rand(1, 6);
//
//        return [
//            'diceOne' => $diceOne,
//            'diceTwo' => $diceTwo,
//            'duplicate' => $diceOne === $diceTwo,
//        ];
//    }
//
//    public function takeTurn(): string
//    {
//        $diceValues = $this->rollDice();
//
//        $newPosition = $this->makeMove($diceValues);
//
//        $this->setPosition($newPosition);
//
//        return $this->getPositionAsString($this->getPosition(), $this);
//    }
//
//    public function makeMove($diceValues): int
//    {
//        return $this->getPosition() + ($diceValues['diceOne'] + $diceValues['diceTwo']);
//    }
//
//    public function getPositionAsString(int $possiblePosition, Player $player): string
//    {
//        return sprintf('Player %d is on square %d', $player->playerId, $possiblePosition);
//    }
//
//    public function getPosition(): int
//    {
//        return $this->position;
//    }
//
//    public function setPosition(int $position)
//    {
//        $this->position = $position;
//    }
//
//}