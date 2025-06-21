<?php

const HEADER_TILE_START = "   _( )__";
const HEADER_TILE = ' _( )__';

const TILE_TOP_EVEN_START = ' _|     _';
const TILE_TOP_EVEN = '|     _';
const TILE_TOP_ODD_START = " |_     ";
const TILE_TOP_ODD = "|_     ";

const TILE_MIDDLE_EVEN_START = '(_   _ ';
const TILE_MIDDLE_EVEN = '(_   _ ';
const TILE_MIDDLE_ODD_START = '  _) _  ';
const TILE_MIDDLE_ODD = ' _) _  ';


const TILE_BOTTOM_START = ' |__( )_';
const TILE_BOTTOM = '|__( )_';

const LINE_LAST_CHARS = [
    'evenTop' => '|',
    'oddTop' => '|_',
    'evenMiddle' => '(_',
    'oddMiddle' => ' _)',
    'bottom' => '|',
];

function puzzleTiles(int $width, int $height): string
{
    $puzzle = generateLine($width, HEADER_TILE_START, HEADER_TILE);
    $puzzle .= "\n";

    for ($i = 0; $i < $height; $i++) {
        if (0 === $i % 2) {
            $puzzle .= generateEvenRow($width, $i === $height - 1);
        } else {
            $puzzle .= generateOddRow($width, $i === $height - 1);
        }
    }

    return $puzzle;
}

function generateEvenRow(int $numberTiles, bool $isLastLine): string
{
    $row = generateLine($numberTiles, TILE_TOP_EVEN_START, TILE_TOP_EVEN);
    $row .= LINE_LAST_CHARS['evenTop'] . "\n";
    $row .= generateLine($numberTiles, TILE_MIDDLE_EVEN_START, TILE_MIDDLE_EVEN);
    $row .= LINE_LAST_CHARS['evenMiddle'] . "\n";
    $row .= generateLine($numberTiles, TILE_BOTTOM_START, TILE_BOTTOM);
    $row .= $isLastLine ? LINE_LAST_CHARS['bottom'] : LINE_LAST_CHARS['bottom'] . "\n";

    return $row;
}

function generateOddRow(int $numberTiles, bool $isLastLine): string
{
    $row = generateLine($numberTiles, TILE_TOP_ODD_START, TILE_TOP_ODD);
    $row .= LINE_LAST_CHARS['oddTop'] . "\n";
    $row .= generateLine($numberTiles, TILE_MIDDLE_ODD_START, TILE_MIDDLE_ODD);
    $row .= LINE_LAST_CHARS['oddMiddle'] . "\n";
    $row .= generateLine($numberTiles, TILE_BOTTOM_START, TILE_BOTTOM);
    $row .= $isLastLine ? LINE_LAST_CHARS['bottom'] : LINE_LAST_CHARS['bottom'] . "\n";

    return $row;
}

function generateLine(int $numberTiles, string $templateStart, string $templateRegular): string
{
    $line = '';
    for ($i = 0; $i < $numberTiles; $i++) {
        if ($i === 0) {
            $line .= $templateStart;
        } else {
            $line .= $templateRegular;
        }
    }

    return $line;
}

echo puzzleTiles(4, 3);