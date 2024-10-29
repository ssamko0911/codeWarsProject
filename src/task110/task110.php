<?php

declare(strict_types=1);

//https://www.codewars.com/kata/5bc7bb444be9774f100000c3/train/php

use App\task110\entity\VersionManager;

require './entity/VersionManager.php';

try {
    $versionManager = new VersionManager();
} catch (Exception $e) {
    // do something if needed;
}
