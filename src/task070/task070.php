<?php

declare(strict_types=1);

//https://www.codewars.com/kata/5544c7a5cb454edb3c000047/train/php

const BALL_COUNT_PER_JUMP = 2;

function bouncingBall(float $height, float $bounce, float $window): int
{
    if (!validateParams([
        'height' => $height,
        'bounce' => $bounce,
        'window' => $window,
    ])) {
        return -1;
    }

    $ballJumpsCounter = 0;

    $ballJumpHeight = $height * $bounce;

    while ($ballJumpHeight > $window) {
        $ballJumpsCounter += BALL_COUNT_PER_JUMP;
        $ballJumpHeight *= $bounce;
    }

    return $ballJumpsCounter + 1;
}

/**
 * @param float[] $params
 * @return bool
 */
function validateParams(array $params): bool
{
    if ($params['height'] <= 0
        || $params['bounce'] >= 1
        || $params['bounce'] <= 0
        || $params['window'] >= $params['height']) {
        return false;
    }

    return true;
}
