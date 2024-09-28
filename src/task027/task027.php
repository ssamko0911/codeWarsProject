<?php

declare(strict_types=1);

//https://www.codewars.com/kata/54dc6f5a224c26032800005c/train/php

function stockList($listOfArt, $listOfCat): string
{
    if ([] === $listOfArt || [] === $listOfCat) {
        return '';
    }

    $result = '';
    foreach ($listOfCat as $category) {
        $filteredCodes = array_filter($listOfArt, function ($art) use ($category) {
           return str_starts_with($art, $category);
        });

        $bookQuantity = array_map(function ($code) {
            return intval(preg_replace("/[^0-9]/", '', $code));
        }, $filteredCodes);

        $result .= getCategoryAndQuantityAsString($category, [] !== $bookQuantity ? array_sum($bookQuantity) : 0);
    }
    return rtrim($result, ' -');
}

function getCategoryAndQuantityAsString(string $category, int $quantity): string
{
    return sprintf("(%s : %d) - ", $category, $quantity);
}
