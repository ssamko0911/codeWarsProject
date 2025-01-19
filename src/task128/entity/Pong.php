<?php

namespace App\task128\entity;

class Pong
{
    private const int PLAYER_ONE = 1;

    private const int PLAYER_TWO = 2;

    private const int HALF_PADDLE_LENGTH = 3;

    private const string GAME_OVER = 'Game Over!';

    private const string WIN = 'Player %d has won the game!';

    private const string HIT = 'Player %d has hit the ball!';

    private const string MISS = 'Player %d has missed the ball!';

    private const string VICTORY = 'has won the game!';

    private int $activePlayer;

    /** @var int[] */
    private array $paddleCoordinates;

    private int $playerOneScore = 0;

    private int $playerTwoScore = 0;

    private int $maxScore;

    private string $turnResult = '';

    public function __construct(int $maxScore)
    {
        $this->maxScore = $maxScore;
        $this->activePlayer = self::PLAYER_ONE;
    }

    public function getTurnResult(): string
    {
        return $this->turnResult;
    }

    public function setTurnResult(string $turnResult): void
    {
        $this->turnResult = $turnResult;
    }

    public function getActivePlayer(): int
    {
        return $this->activePlayer;
    }

    public function setActivePlayer(int $activePlayer): void
    {
        $this->activePlayer = $activePlayer;
    }

    public function getMaxScore(): int
    {
        return $this->maxScore;
    }

    public function getPlayerOneScore(): int
    {
        return $this->playerOneScore;
    }

    public function setPlayerOneScore(int $playerOneScore): void
    {
        $this->playerOneScore = $playerOneScore;
    }

    public function getPlayerTwoScore(): int
    {
        return $this->playerTwoScore;
    }

    public function setPlayerTwoScore(int $playerTwoScore): void
    {
        $this->playerTwoScore = $playerTwoScore;
    }

    /**
     * @return int[]
     */
    public function getPaddleCoordinates(): array
    {
        return $this->paddleCoordinates;
    }

    public function setPaddleCoordinates(int $playerPosition): void
    {
        $this->paddleCoordinates = range($playerPosition - self::HALF_PADDLE_LENGTH, $playerPosition + self::HALF_PADDLE_LENGTH);
    }


    public function play(int $ballPos, int $playerPos): string
    {
        if ($this->isGameOver()) {
            return self::GAME_OVER;
        }

        $this->setPaddleCoordinates($playerPos);

        if (in_array($ballPos, $this->getPaddleCoordinates(), true)) {
            $this->setTurnResult(sprintf(self::HIT, $this->getActivePlayer()));
        } else {
            $this->setTurnResult(sprintf(self::MISS, $this->getActivePlayer()));
            $this->changeScore();
        }

        if ($this->isMaxScore()) {
            $this->setTurnResult(
                sprintf(self::WIN,
                    $this->getPlayerOneScore() > $this->getPlayerTwoScore() ? self::PLAYER_ONE : self::PLAYER_TWO
                )
            );
        }

        $this->changePlayer();

        return $this->getTurnResult();
    }

    private function isGameOver(): bool
    {
        return str_contains($this->getTurnResult(), self::VICTORY);
    }


    private function changeScore(): void
    {
        if ($this->getActivePlayer() === self::PLAYER_ONE) {
            $this->setPlayerTwoScore($this->getPlayerTwoScore() + 1);
        } else {
            $this->setPlayerOneScore($this->getPlayerOneScore() + 1);
        }
    }

    private function isMaxScore(): bool
    {
        return $this->getMaxScore() === $this->getPlayerOneScore() || $this->getMaxScore() === $this->getPlayerTwoScore();
    }

    private function changePlayer(): void
    {
        if ($this->getActivePlayer() === self::PLAYER_ONE) {
            $this->setActivePlayer(self::PLAYER_TWO);
        } else {
            $this->setActivePlayer(self::PLAYER_ONE);
        }
    }
}
