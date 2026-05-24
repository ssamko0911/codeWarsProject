<?php declare(strict_types=1);

// https://www.codewars.com/kata/5a54e796b3bfa8932c0000ed

const JUMPING_LABEL = 'Jumping!!';
const NOT_JUMPING_LABEL = 'Not!!';


function jumpingNumber(int $number): string
{
    $isJumping = true;

    $numberAsArray = array_map(
        intval(...),
        str_split((string)$number)
    );

    $length = count($numberAsArray);

    for ($i = 1; $i < $length; $i++) {
        if ($numberAsArray[$i] !== $numberAsArray[$i - 1] - 1  &&
            $numberAsArray[$i] !== $numberAsArray[$i - 1] + 1
        ) {
            $isJumping = false;
            break;
        }
    }

    return $isJumping ? JUMPING_LABEL : NOT_JUMPING_LABEL;
}
