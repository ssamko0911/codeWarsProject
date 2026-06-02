<?php declare(strict_types=1);

namespace App\task273\Entity;

use DomainException;

final class Driver
{
    private const string DESC = 'D';
    private const string LEFT = 'L';
    private const string RIGHT = 'R';

    private Position $currentPosition;

    public function __construct(
        private readonly CarPark $carPark
    ) {
        $this->currentPosition = $this->carPark->getCarPosition();
    }

    private function findDirection(int $currentPosX, int $destinationX): string
    {
        return match (true) {
            $currentPosX === $destinationX => self::DESC,
            $currentPosX > $destinationX => self::LEFT,
            $currentPosX < $destinationX => self::RIGHT,
            default => throw new DomainException('Staircase is absent')
        };
    }

    /**
     * @return string[]
     */
    public function logMoves(): array
    {
        $movesLog = [];

        $carParkHeight = count($this->carPark->layout);
        $descCounter = 1;

        for ($i = $this->currentPosition->y; $i < $carParkHeight; $i++) {
            if ($i === $carParkHeight - 1) {
                $exitDirection = $this
                    ->findDirection(
                        $this->currentPosition->x,
                        $this->carPark->getExit()->x
                    );

                $steps = $this->currentPosition->countSteps(
                    $this->currentPosition->x,
                    $this->carPark->getExit()->x
                );

                if (0 === $steps) {
                    break;
                }

                $this->currentPosition->moveTo($exitDirection, $steps);
                $movesLog[] = $exitDirection . $steps;
            } else {
                $staircasePos = $this->carPark->getStaircasePosition($this->currentPosition->y);

                $staircaseDirection = $this
                    ->findDirection(
                        $this->currentPosition->x,
                        $staircasePos
                    );

                $steps = $this->currentPosition->countSteps(
                    $this->currentPosition->x,
                    $staircasePos
                );

                $this->currentPosition->moveTo($staircaseDirection, $steps);

                if (0 === $steps) {
                    $movesLog[array_key_last($movesLog)] = $staircaseDirection . $descCounter;
                } else {
                    $movesLog[] = $staircaseDirection . $steps;
                }
            }

            if (1 === $this->carPark->layout[$i][$this->currentPosition->x]) {
                $descCounter++;

                if (str_starts_with($movesLog[array_key_last($movesLog)], self::DESC)) {
                    $movesLog[array_key_last($movesLog)] = self::DESC . $descCounter;
                } else {
                    $descCounter = 1;
                    $movesLog[] = self::DESC . $descCounter;
                }

                $this->currentPosition = new Position(
                    $this->currentPosition->x,
                    $this->currentPosition->y + 1
                );
            }
        }

        return $movesLog;
    }
}