<?php

declare(strict_types=1);

//https://www.codewars.com/kata/5616868c81a0f281e500005c/train/php

/**
 * @param string $string
 * @param int[] $weights
 * @param int $rank
 * @return string
 */
function getRank(string $string, array $weights, int $rank): string
{
    if (strlen($string) === 0) {
        return 'No participants';
    }

    $drawParticipants = [];

    $names = explode(',', $string);

    if ($rank > count($names)) {
        return 'Not enough participants';
    }

    foreach ($names as $key => $name) {
        $sum = 0;
        for ($i = 0; $i < strlen($name); $i++) {
            $sum += getCharacterBasicScore($name[$i]);
        }
        $sum += strlen($name);
        $sum *= $weights[$key];
        $drawParticipants[] = [
            'name' => $name,
            'sum' => $sum,
        ];
    }

    $drawParticipants = sortParticipants($drawParticipants);

    return $drawParticipants[$rank - 1]['name'];
}

function getCharacterBasicScore(string $char): int
{
    return ord(strtolower($char)) - 96;
}

/**
 * @param array<string, string> $participants
 * @return array<string, string>
 */
function sortParticipants(array $participants): array
{
    $name = array_column($participants, 'name');
    $sum = array_column($participants, 'sum');
    array_multisort($sum, SORT_DESC, $name, SORT_STRING, $participants);

    return $participants;
}
