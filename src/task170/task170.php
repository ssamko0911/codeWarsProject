<?php declare(strict_types=1);
//https://www.codewars.com/kata/6444f6b558ed4813e8b70d43/train/php

const BAR_TOP = ' ____ ';
const BAR_SIDES = '|    |';
const BAR_EMPTY = '......';

function graph(array $data): string {
    if(0 === count($data)) {
        return '';
    }

    $maxHeight = max($data);

    $graph = '';

    for ($i = $maxHeight; $i >=0 ; $i--) {
        $graphLine = '';

        for ($j = 0; $j < count($data); $j++) {
            if ($i === $data[$j]) {
                $graphLine .= BAR_TOP;
            } else if ($i < $data[$j] ) {
                $graphLine .= BAR_SIDES;
            } else {
                $graphLine .= BAR_EMPTY;
            }

        }

        $graphLine .= ($i === $maxHeight) ? " ^ $i\n" :  " | $i\n";

        if ($i === 0) {
            $graphLine = rtrim($graphLine);
        }

        $graph .= $graphLine;
    }

    return $graph;
}
