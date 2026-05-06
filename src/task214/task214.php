<?php declare(strict_types=1);

//https://www.codewars.com/kata/5aca2aceb4f6352a4100004f/train/php

function largestPalindromicProduct(int $lower, int $upper): ?int
{
    $maxProduct = 0;
    $limit = 0;

    for ($i = $upper; $i >= $lower; $i--) {
        for ($j = $upper; $j >= $lower; $j--) {
            $product = $i * $j;

            if ($product < $limit) {
                break;
            }

            if ((string)$product === strrev((string)$product)) {
                if ($i === $upper) {
                    $limit = $product;
                }

                if ($product > $maxProduct) {
                    $maxProduct = $product;
                }
            }
        }
    }

    return $maxProduct === 0 ? null : $maxProduct;
}

echo largestPalindromicProduct(10, 99).PHP_EOL;
echo largestPalindromicProduct(1, 333).PHP_EOL;
echo largestPalindromicProduct(1234, 4231).PHP_EOL;

