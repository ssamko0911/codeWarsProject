<?php

declare(strict_types=1);

require '../../vendor/autoload.php';

use App\task159\Entity\Grid;
use App\task159\Entity\Password;

$array = [
    ["a", "x", "c"],
    ["g", "l", "t"],
    ["o", "v", "e"]
];

$grid = new Grid($array);
$password = new Password($grid);

$directions = ["downT", "down", "leftT", "rightT", "rightT", "upT"];

$encoded= $password->getPassword($directions);
