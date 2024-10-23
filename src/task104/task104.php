<?php

declare(strict_types=1);

//https://www.codewars.com/kata/652643925c042100247fffc6/train/php

const CONTAINER_TYPE = [
    'box' => '{',
    'pallet' => '[',
    'bag' => '(',
];

const CONTAINER_VOLUME = [
    'box' => 10,
    'pallet' => 50,
];

/**
 * @param string [] $orders
 * @return array<int, string[]>
 */
function fruit_pack(array $orders): array
{
    $packed = [];

    foreach ($orders as $order) {
        $packed[] = getOneOrderPack($order);
    }

    return $packed;
}

/**
 * @param string $order
 * @return string[]
 */
function getOneOrderPack(string $order): array
{
    $ordersAsArray = getOrdersAsArray($order);

    $packedFruits = getPackedFruitsAsArray($ordersAsArray);

    $shelves = stockShelves($packedFruits);

    $shelfMaxLength = max(array_map('strlen', $shelves));

    return array_map(function ($shelf) use ($shelfMaxLength) {
        return strlen($shelf) < $shelfMaxLength ? str_repeat('-', $shelfMaxLength - strlen($shelf)) . $shelf : $shelf;
    }, $shelves);
}

/**
 * @param string $orderString
 * @return string[]
 */
function getOrdersAsArray(string $orderString): array
{
    $orderAsArray = [$orderString[0]];

    for ($i = 1; $i < strlen($orderString); $i++) {
        if (is_numeric($orderString[$i]) && is_numeric($orderString[$i - 1])) {
            $previous = array_pop($orderAsArray);
            $orderAsArray[] = $previous . $orderString[$i];
        } else {
            $orderAsArray[] = $orderString[$i];
        }
    }

    return $orderAsArray;
}

/**
 * @param int $value
 * @param string $char
 * @return string[]
 */
function getPackedFruits(int $value, string $char): array
{
    $packedFruits = [];

    if ($value / CONTAINER_VOLUME['pallet'] >= 1) {
        $items = intval($value / CONTAINER_VOLUME['pallet']);
        $packedFruits[] = str_repeat('[' . $char  . ']', $items);
        $value -= CONTAINER_VOLUME['pallet'] * $items;
    }

    if ($value / CONTAINER_VOLUME['box'] >= 1) {
        $items = intval($value / CONTAINER_VOLUME['box']);
        $packedFruits[] = str_repeat('{' . $char . '}', $items);
        $value -= CONTAINER_VOLUME['box'] * $items;
    }

    if ($value > 0) {
        $packedFruits[] = '(' . str_repeat($char, $value) . ')';
    }

    return $packedFruits;
}

/**
 * @param string[] $order
 * @return array<int, string[]>
 */
function getPackedFruitsAsArray(array $order): array
{
    $packedFruits = [];

    for ($i = 0; $i < count($order); $i++) {
        if ($i % 2 === 0) {
            $packedFruits[] = getPackedFruits(intval($order[$i]), $order[$i + 1]);
        }
    }

    return $packedFruits;
}

/**
 * @param array<int, string[]> $packedFruits
 * @return string[]
 */
function stockShelves(array $packedFruits): array
{
    $shelves = [
        0 => '',
        1 => '',
        2 => ''
    ];

    foreach ($packedFruits as $packedOrder) {
        foreach ($packedOrder as $packedItems) {
            if (str_starts_with($packedItems, CONTAINER_TYPE['bag'])) {
                $shelves[0] .= $packedItems;
            }

            if (str_starts_with($packedItems, CONTAINER_TYPE['box'])) {
                $shelves[1] .= $packedItems;
            }

            if (str_starts_with($packedItems, CONTAINER_TYPE['pallet'])) {
                $shelves[2] .= $packedItems;
            }
        }
    }

    return $shelves;
}
