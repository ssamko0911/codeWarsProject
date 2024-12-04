<?php

declare(strict_types=1);

//https://www.codewars.com/kata/579735144be912fd220001d8/train/php

use App\task118\entity\President;

require 'entity/President.php';

$us_president = new President();
$president_name = $us_president->name;
$greetings_from_president = $us_president->greet('Donald');
