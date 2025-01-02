<?php

declare(strict_types=1);

//https://www.codewars.com/kata/58708934a44cfccca60000c4/train/php

function highlight(string $code): string
{
    $highlightedCode = '';

    $stringsToHighlightAsArray = getGroupedStringsAsArray($code);

    foreach ($stringsToHighlightAsArray as $string) {
        if (ctype_alpha($string)) {
            $highlightedCode .= getStringHTML($string);
        } elseif (is_numeric($string)) {
            $highlightedCode .= getNumberHTML($string);
        } else {
            $highlightedCode .= $string;
        }
    }

    return $highlightedCode;
}

function getStringHTML(string $str): string
{
    $colors = [
        'F' => 'pink',
        'L' => 'red',
        'R' => 'green',
    ];

    $key = 1 < strlen($str) ? $str[0] : $str;

    return sprintf('<span style="color: %s">%s</span>', $colors[$key], $str);
}

function getNumberHTML(string $number): string
{
    return sprintf('<span style="color: orange">%s</span>', $number);
}

/**
 * @param string $str
 * @return string[]
 */
function getGroupedStringsAsArray(string $str): array
{
    $string = '';
    $numericString = '';
    $groupedStrings = [];

    for ($i = 0; $i < strlen($str); $i++) {
        if (preg_match('/^[F|L|R]+$/', $str[$i])) {
            if (0 !== strlen($numericString)) {
                $groupedStrings[] = $numericString;
                $numericString = '';
            }

            if (!empty($string) && $string[strlen($string) - 1] === $str[$i]) {
                $string .= $str[$i];

                if (0 !== strlen($numericString)) {
                    $groupedStrings[] = $numericString;
                    $numericString = '';
                }
            } else {
                if (0 !== strlen($numericString)) {
                    $groupedStrings[] = $numericString;
                    $numericString = '';
                }

                $groupedStrings[] = $string;
                $string = $str[$i];
            }
        } elseif (preg_match('/^[0-9]*$/', $str[$i])) {
            $numericString .= $str[$i];

            if (!empty($string)) {
                $groupedStrings[] = $string;
                $string = '';
            }
        } else {
            if (!empty($string)) {
                $groupedStrings[] = $string;
                $string = '';
            }

            if (0 !== strlen($numericString)) {
                $groupedStrings[] = $numericString;
                $numericString = '';
            }

            $groupedStrings[] = $str[$i];
        }
    }

    if (0 !== strlen($numericString)) {
        $groupedStrings[] = $numericString;
    }

    if (!empty($string)) {
        $groupedStrings[] = $string;
    }

    return array_filter($groupedStrings, function ($item) {
        return 0 !== strlen($item);
    });
}

/**
 * BP:
 *
 * function highlight(string $code): string {
 * return preg_replace(
 * array(
 * '/(F+)/',
 * '/(L+)/',
 * '/(R+)/',
 * '/(\d+)/',
 * ),
 * array(
 * '<span style="color: pink">$1</span>',
 * '<span style="color: red">$1</span>',
 * '<span style="color: green">$1</span>',
 * '<span style="color: orange">$1</span>',
 * ),
 * $code
 * );
 * }
 */