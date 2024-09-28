<?php

declare(strict_types=1);

namespace App\task048\Enum;

enum GameResult: string
{
    case FINISH = 'Finish';
    case DEAD = 'Dead';
    case LOST = 'Lost';
}
