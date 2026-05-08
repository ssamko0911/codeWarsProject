<?php declare(strict_types=1);

//https://www.codewars.com/kata/55befc42bfe4d13ab1000007/train/php

require '../../vendor/autoload.php';

use App\task213\Model\Node;

$node = new Node(1, new Node(2, new Node(3)));
echo $node->get_nth($node, 3) . PHP_EOL;
echo $node->get_nth($node, 1) . PHP_EOL;
echo $node->get_nth($node, 2) . PHP_EOL;
