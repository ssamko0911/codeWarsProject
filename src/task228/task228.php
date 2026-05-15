<?php declare(strict_types=1);

require_once __DIR__ . "/../../vendor/autoload.php";

// https://www.codewars.com/kata/55be95786abade3c71000079/train/php

const FAKE_DATA = [
    1,
    2,
    3,
];

use App\task228\Entity\Node;

function push(?Node $head, int $data): Node
{
    return new Node(
        $data,
        $head
    );
}

function build_one_two_three(): Node
{
    return new Node(
        FAKE_DATA[0],
        new Node(
            FAKE_DATA[1],
            new Node(
                FAKE_DATA[2],
                null
            )
        ),
    );
}

$chained = null;
$chained = push($chained, 3);
$chained = push($chained, 2);
$chained = push($chained, 1);
var_dump(push($chained, 8));