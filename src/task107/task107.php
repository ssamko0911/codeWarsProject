<?php

declare(strict_types=1);

//https://www.codewars.com/kata/585de868851516395e0003d3/train/php

use App\task107\Entity\URLBuilder;

require './Entity/URLBuilder.php';

try {
    $urlBuilder = new URLBuilder([
        'host' => 'test.com',
        'scheme' => 'https',
        'user' => 'rubens',
        'pass' => 't@st',
        'path' => '/some/path',
        'query' => [
            'klm' => 'mno',
            'xyz' => '&pqr'
        ],
        'fragment' => 'frag'
    ]);
} catch (Exception $e) {

}
