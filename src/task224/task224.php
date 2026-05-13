<?php declare(strict_types=1);

// https://www.codewars.com/kata/633701c187ca520016eec664/train/php

class ParkingLot
{
    private array $slots = []; // null => empty, string => license
    private array $map = [];   // license => ['start' => int, 'len' => int]

    public function __construct(int $size)
    {
        if ($size < 0) {
            throw new InvalidArgumentException("Size must be non-negative");
        }
        $this->slots = array_fill(0, $size, null);
    }

    private function neededSlots(Vehicle $vehicle): int
    {
        if ($vehicle instanceof Bike) {
            return 1;
        }
        if ($vehicle instanceof Car) {
            return 2;
        }
        if ($vehicle instanceof Van) {
            return 3;
        }

        throw new InvalidArgumentException("Unknown vehicle type");
    }

    public function park(Vehicle $vehicle): bool
    {
        $license = $vehicle->license;
        if (isset($this->map[$license])) {
// already parked
            return false;
        }

        $need = $this->neededSlots($vehicle);
        $n = count($this->slots);
        if ($need === 0 || $need > $n) {
            return false;
        }

        $run = 0;
        for ($i = 0; $i < $n; $i++) {
            if ($this->slots[$i] === null) {
                $run++;
            } else {
                $run = 0;
            }

            if ($run === $need) {
                $start = $i - $need + 1;
                for ($j = $start; $j <= $i; $j++) {
                    $this->slots[$j] = $license;
                }
                $this->map[$license] = ['start' => $start, 'len' => $need];

                return true;
            }
        }

        return false;
    }

    public function retrieve(string $license): bool
    {
        if (!isset($this->map[$license])) {
            return false;
        }

        $start = $this->map[$license]['start'];
        $len = $this->map[$license]['len'];

        for ($i = $start; $i < $start + $len; $i++) {
            $this->slots[$i] = null;
        }

        unset($this->map[$license]);

        return true;
    }

// Debug helper
    public function debugState(): array
    {
        return [
            'slots' => $this->slots,
            'map' => $this->map,
        ];
    }
}
