<?php

declare(strict_types=1);

//https://www.codewars.com/kata/587136ba2eefcb92a9000027/train/php

/*
 * init board, init players;
 * while (player1->position !== 100 || player2->position !== 100) {
 *      takeTurn player1 -> output;
 *      takeTurn player2 -> output;
 * }
 */

use App\task053\Entity\Player;
use App\task053\Entity\SnakesLadders;
use App\task053\GameValidator\GameValidator;

//$limit = 100;
//function play(): string
//{
//
//    $board = new SnakesLadders();
//    $playerOne = new Player(1);
//    $playerTwo = new Player(2);
//
//    while ($playerOne->getPosition() !== $board->finalScore || $playerTwo->getPosition() !== $board->finalScore) {
//        $diceValues = $playerOne->rollDice();
//        $nextTurn = $playerOne->makeMove($diceValues);
//
//        $isSnakeCatch = false;
//        foreach ($board->snakes as $snake) {
//            if ($nextTurn === $snake['start']) {
//                $nextTurn = $snake['end'];
//                echo 'Snake: ' . $snake['start'] . ', position: ' . $snake['end'] . PHP_EOL;
//                $isSnakeCatch = true;
//                break;
//            }
//        }
//
//        if ($diceValues['duplicate'] && !$isSnakeCatch) {
//            $playerOne->setPosition($nextTurn);
//            echo 'P1: ' . $playerOne->getPosition() . PHP_EOL;
//            $playerOne->setPosition($nextTurn);
//            echo 'P1: ' . $playerOne->getPosition() . PHP_EOL;
//        } else {
//            $playerOne->setPosition($nextTurn);
//            echo 'P1: ' . $playerOne->getPosition() . PHP_EOL;
//        }
//
//        if ($playerOne->getPosition() > $board->finalScore) {
//            $playerOne->setPosition($board->bounceBack($playerOne));
//        }
//
//        if ($playerOne->getPosition() === $board->finalScore) {
//            return "Player {$playerOne->getPlayerId()} Wins!";
//        }
//
//        $diceValues = $playerTwo->rollDice();
//        $nextTurn = $playerTwo->makeMove($diceValues);
//
//        $isSnakeCatch = false;
//        foreach ($board->snakes as $snake) {
//            if ($nextTurn === $snake['start']) {
//                $nextTurn = $snake['end'];
//                echo 'Snake: ' . $snake['start'] . ', position: ' . $snake['end'] . PHP_EOL;
//                $isSnakeCatch = true;
//                break;
//            }
//        }
//
//        $isLadder = false;
//        foreach ($board->ladders as $ladder) {
//            if ($nextTurn === $ladder['start']) {
//                $nextTurn = $ladder['end'];
//                echo 'Ladder: ' . $ladder['start'] . ', position: ' . $ladder['end'] . PHP_EOL;
//                $isLadder = true;
//                break;
//            }
//        }
//
//        if ($diceValues['duplicate'] && !$isSnakeCatch) {
//            $playerTwo->setPosition($nextTurn);
//            echo 'P2: ' . $playerTwo->getPosition() . PHP_EOL;
//            $playerTwo->setPosition($nextTurn);
//            echo 'P2: ' . $playerTwo->getPosition() . PHP_EOL;
//        } else {
//            $playerTwo->setPosition($nextTurn);
//            echo 'P2: ' . $playerTwo->getPosition() . PHP_EOL;
//        }
//
//        if ($playerTwo->getPosition() > $board->finalScore) {
//            $playerTwo->setPosition($board->bounceBack($playerTwo));
//        }
//
//        if ($playerTwo->getPosition() === $board->finalScore) {
//            return "Player {$playerTwo->getPlayerId()} Wins!";
//        }
//    }
//
//    return 'Game Over!';
//}
//
//
////
////echo play();

$game = new SnakesLadders();

echo $game->play(1,1);
echo $game->play(1,5);
echo $game->play(6,2);
echo $game->play(1,1);