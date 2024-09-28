<?php

declare(strict_types=1);

namespace App\task048\Enum;

enum PositionCode: int
{
    case OUT = 0;
    case WALL = 1;
    case START = 2;
    case FINISH = 3;
}
