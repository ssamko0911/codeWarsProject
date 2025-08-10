<?php declare(strict_types=1);

//https://www.codewars.com/kata/630649f46a30e8004b01b3a3

const CENTRE = '+';
const LINE_X = '-';
const LINE_Y = '|';
const POINT = '*';
const EMPTY_CHAR = ' ';

/**
 * @param array<int, array<string, int>> $points
 * @return array<int, array<int, int|string>>|array[]
 */
function constructGraph(array $points): array
{
    if (0 === count($points)) {
        return [[CENTRE]];
    }

    $graph = [];

    $axis = getRangeData($points, 'x');
    $lineX = $axis['start'] > 0 ? range(0, $axis['end']) : range($axis['start'], $axis['end']);

    $centerIndex = array_search(0, $lineX);

    array_walk($lineX, function (&$value) {
        if ($value === 0) {
            $value = LINE_Y;
        } else {
            $value = EMPTY_CHAR;
        }
    });

    $ordinate = getRangeData($points, 'y');

    for ($i = $ordinate['start']; $i > 0; $i--) {
        $graph[] = $lineX;
    }

    $axisCoordinatesLine = [];
    for ($j = 0; $j < count($lineX); $j++) {
        if ($centerIndex === $j) {
            $axisCoordinatesLine[] = CENTRE;
        } else {
            $axisCoordinatesLine[] = LINE_X;
        }
    }

    $graph[] = $axisCoordinatesLine;

    if ($ordinate['end'] < 0) {
        for ($k = 1; $k <= abs($ordinate['end']); $k++) {
            $graph[] = $lineX;
        }
    }

    markPoints($graph, $points, $ordinate, $centerIndex);

    return $graph;
}

/**
 * @param array<int, array<string, int>> $points
 * @param string $param
 * @return array<string, int>
 */
function getRangeData(array $points, string $param): array
{
    $max = 0;
    $min = $points[0][$param];

    foreach ($points as $point) {
        if ($point[$param] > $max) {
            $max = $point[$param];
        }

        if ($point[$param] < $min) {
            $min = $point[$param];
        }
    }

    return [
        'start' => $param === 'y' ? $max : $min,
        'end' => $param === 'y' ? $min : $max,
    ];
}

/**
 * @param array<int, array<int, int|string>> $graph
 * @param array<int, array<string, int>> $points
 * @param array<string, int> $ordinate
 * @param int $centerIndex
 * @return void
 */
function markPoints(array &$graph, array $points, array $ordinate, int $centerIndex): void
{
    foreach ($points as $point) {
        $rowIndex = $ordinate['start'] - $point['y'];
        $colIndex = $centerIndex + $point['x'];

        if (isset($graph[$rowIndex][$colIndex])) {
            $graph[$rowIndex][$colIndex] = POINT;
        }
    }
}
