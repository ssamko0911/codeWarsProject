<?php

declare(strict_types=1);

//https://www.codewars.com/kata/576757b1df89ecf5bd00073b/train/php

/**
 * @param int $towerHeight
 * @return int[]
 */
function buildTower(int $towerHeight): array
{
    $tower = [];

    $towerWidth = getBuildingWidth($towerHeight);

    for ($i = 0; $i < $towerHeight; $i++) {
        $tower[$i] = buildFloor($towerHeight, $towerWidth, $i);
    }

    return $tower;
}

function getBuildingWidth(int $buildingHeight): int
{
    return ($buildingHeight * 2) - 1;
}

function buildFloor(int $buildingHeight, int $buildingWidth, int $floorIdentifier): string
{
    $floor = '';

    for ($i = 0; $i < $buildingWidth; $i++) {
        if ($i >= (($buildingWidth - $floorIdentifier) % $buildingHeight)
            && $i < $buildingWidth - (($buildingWidth - $floorIdentifier) % $buildingHeight)) {
            $floor .= '*';
        } else {
            $floor .= ' ';
        }
    }

    return $floor;
}
