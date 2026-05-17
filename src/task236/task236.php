<?php declare(strict_types=1);

/**
 * @param int[] $array
 * @return array<int, int[]>
 */
function makeParts(array $array, int $chunkSize): array {
    if (1 > $chunkSize) {
        return [];
    }

    $chunks = [];
    $buffer = [];

    foreach ($array as $item) {
        $buffer[] = $item;

        if ($chunkSize === count($buffer)) {
            $chunks[] = $buffer;
            $buffer = [];
        }
    }

    if ([] !== $buffer) {
        $chunks[] = $buffer;
    }

    return $chunks;
}
