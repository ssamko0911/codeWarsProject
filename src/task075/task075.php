<?php

declare(strict_types=1);

//https://leetcode.com/problems/valid-parentheses/

const VALID_PARENTHESES = [
    'round' => '()',
    'square' => '[]',
    'curly' => '{}',
];

/**
 * @param string $string
 * @return bool
 */
function isValid(string $string): bool
{
    $cleaned = removeUnnecessaryChars($string);

    while (true) {
        if (checkParentheses(VALID_PARENTHESES['round'], $cleaned)) {
            $cleaned = replaceParentheses(VALID_PARENTHESES['round'], $cleaned);
        } elseif (checkParentheses(VALID_PARENTHESES['square'], $cleaned)) {
            $cleaned = replaceParentheses(VALID_PARENTHESES['square'], $cleaned);
        } elseif (checkParentheses(VALID_PARENTHESES['curly'], $cleaned)) {
            $cleaned = replaceParentheses(VALID_PARENTHESES['curly'], $cleaned);
        } else {
            break;
        }
    }

    return 0 === strlen($cleaned);
}

function removeUnnecessaryChars(string $str): string
{
    return preg_replace('/[^\{\}\(\)\[\]]+/', '', $str);
}

function checkParentheses(string $parentheses, string $subject): bool
{
    return str_contains($subject, $parentheses);
}

function replaceParentheses(string $parentheses, string $subject): string
{
    return str_replace($parentheses, '', $subject);
}
