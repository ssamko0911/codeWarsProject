<?php declare(strict_types=1);

// https://www.codewars.com/kata/581e476d5f59408553000a4b/train/php

require '../../vendor/autoload.php';

use App\task212\model\Node;

$node = new Node(1, new Node(2, new Node(3, new Node(4))));
