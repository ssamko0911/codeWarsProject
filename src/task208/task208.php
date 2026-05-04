<?php declare(strict_types=1);

//https://www.codewars.com/kata/59727ff285281a44e3000011/train/php

const PREFIX = 'The ';
function bandNameGenerator(string $proposedName): string {
    $firstLetterEqualsLastLetter = strtolower($proposedName[0]) === strtolower($proposedName[strlen($proposedName) - 1]);

    if ($firstLetterEqualsLastLetter) {
        return ucfirst($proposedName) . substr($proposedName, 1);
    }

    return PREFIX . ucfirst($proposedName);
}
