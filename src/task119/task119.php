<?php

declare(strict_types = 1);

//https://www.codewars.com/kata/579775203467db17b500037b/train/php

use App\task119\entity\Person;

require 'entity/Person.php';

$person = new Person('Serhii', 'Samko');
echo $person->get_full_name();
