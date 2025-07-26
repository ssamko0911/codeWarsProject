<?php declare(strict_types=1);

//https://www.codewars.com/kata/5834a44e44ff289b5a000075/train/php

function my_crib(int $layers): string
{
    $house = '';
    $houseWidth = ($layers + 1) * 2;

    for ($i = 0; $i < $layers + 1; $i++) {
        $house .= generateRoofLine($houseWidth, $i, $layers) . "\\n";
    }

    for ($i = 0; $i < $layers; $i++) {
        $house .= generateWalls($houseWidth, $i, $layers);

        if ($i < $layers - 1) {
            $house .= "\\n";
        }
    }

    return $house;
}

function generateRoofLine(int $width, int $currentHeight, int $totalLayers): string
{
    $line = '';

    for ($j = 0; $j < $width; $j++) {

        if ($j === $totalLayers - $currentHeight) {
            $line .= '/';
        }

        if ($j === $totalLayers + $currentHeight) {
            $line .= '\\';
        }

        if (($j < $totalLayers + $currentHeight || $j > $totalLayers - $currentHeight)
            && strlen($line) < $width) {
            $line .= $currentHeight === $totalLayers ? '_' : ' ';
        }
    }

    return $line;
}

function generateWalls(int $width, int $currentHeight, int $totalLayers): string
{
    $line = '';

    for ($j = 0; $j < $width; $j++) {

        if ($j === 0 || $j === $width - 1) {
            $line .= '|';
        } else {
            $line .= $currentHeight === $totalLayers - 1 ? '_' : ' ';
        }
    }

    return $line;
}
